@extends('layouts.app')

@section('content')
    <h2>Ciao {{ $account->name }}!</h2>
    <div class="bg-white shadow">
        <table class="table">
            <tr>
                <th>Name</th>
                <td>{{ $account->name }}</td>
            </tr>
            <tr>
                <th>Surname</th>
                <td>{{ $account->surname }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $account->username }}</td>
            </tr>
            <tr>
                <th>email</th>
                <td>{{ $account->email }}</td>
            </tr>
        </table>
    </div>
    <div class="card">
        <div class="card-header">{{ $account->name }}</div>

        <div class="card-body">
            {{ $account->email }}
        </div>
    </div>
@endsection
