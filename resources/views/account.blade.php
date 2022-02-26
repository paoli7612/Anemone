@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $account->name }}</div>

        <div class="card-body">
            {{ $account->email }}
        </div>
    </div>
@endsection
