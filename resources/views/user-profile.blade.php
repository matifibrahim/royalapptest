@extends('layout.app')

@section('bodycontent')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 card shadow">
            <div class="card-header text-center">
                <h1 class="text-uppercase font-weight-bold text-primary">User Info</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $user['gender'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
