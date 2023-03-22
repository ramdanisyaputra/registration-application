@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
<style>
    body {
        background: none !important;
    }
</style>
@endsection

@section('content')
<h3 class="text-center mt-4">List User</h3>
<div class="table-responsive mt-3">
    <table class="table table-bordered table-striped" id="dataTable">
        <thead>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>Country</th>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ $user->country->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection