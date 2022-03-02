@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ $date->format('d l F') }}</h1>
    </div>

    <div id="app">
        @foreach (['Tugurio', 'Cella', 'Bancone'] as $room)
            <div class="card">
                <div class="card-header ">
                    <b>
                        {{ $room }}
                    </b>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($products as $product)
                            <product-component name="{{ $product->name }}" stock="{{ $product->stock }}">
                            </product-component>
                        @endforeach
                    </table>
                </div>
            </div>
        @endforeachs
    </div>
@endsection
