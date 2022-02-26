@extends('layouts.app')

@section('content')
    <div class="card">

        @foreach ($products as $product)
            <div class="card-body">
                {{ $product->name }}
            </div>
        @endforeach

    </div>
@endsection
