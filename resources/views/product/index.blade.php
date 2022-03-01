@extends('layouts.app')

@section('content')
    <div class="card">

        @foreach ($products as $product)
            <div class="card-body">
                <b>{{ $product->category->name }}</b>
                {{ $product->name }}
            </div>
        @endforeach

    </div>
@endsection
