@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
            
            </div>
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="My Name" required autofocus>
                        <label for="floatingInputName">Name</label>
                        @if($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" required>
                        <label for="floatingInputEmail">Email address</label>
                        @if($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        @if($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" required>
                        <label for="floatingPasswordConfirm">Confirm Password</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="date" name="date_of_birth" class="form-control" id="floatingDate" required>
                        <label for="floatingDate">Date Of Birth</label>
                    </div>
                    @if($errors->has('date_of_birth'))
                        <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                    @endif
                    <div class="form-floating mb-3">
                        <select name="country_id" class="form-control" id="floatingCountry">
                            <option value="" disabled selected>Choose Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->code }} | {{ $country->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingCountry">Country</label>
                        @if($errors->has('country_id'))
                            <small class="text-danger">{{ $errors->first('country_id') }}</small>
                        @endif
                    </div>
                    <div class="d-grid mb-2">
                        <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                    </div>
                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.slim.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $( '#floatingCountry' ).select2( {
        theme: 'bootstrap-5'
    } );
</script>
@endsection