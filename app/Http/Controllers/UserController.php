<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStoreApiRequest;
use App\Http\Requests\RegistrationStoreRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(): View
    {
        $data['countries'] = Country::all();

        return view('users.register', $data);
    }

    public function list(): View
    {
        $data['users'] = User::with('country')->get();

        return view('users.list', $data);
    }

    public function store(RegistrationStoreRequest $request): RedirectResponse
    {
        $request->validated();

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'country_id'    => $request->country_id
        ]);

        return redirect()->route('user.list');
    }

    public function listApi(Request $request)
    {
        $user_name = $request->name;
        $country_name = $request->country;
        if($user_name || $country_name){
            $country_id = null;
            if($country_name){
                $country = Country::where('name', 'LIKE', '%' . $country_name . '%')->first()->id;
                $country_id = $country;
            }
        
            $users = User::where(function($query) use ($user_name, $country_id){
                $query->where('name', 'LIKE', '%' . $user_name . '%');
                if($country_id){
                    $query->where('country_id', $country_id);
                }
            })->with('country')->get();
        }else{
            $users = User::with('country')->get();
        }

        return $users;
    }

    public function storeApi(RegistrationStoreApiRequest $request)
    {
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'country_id'    => $request->country_id
        ]);

        return response()->json($user, 201);
    }
}
