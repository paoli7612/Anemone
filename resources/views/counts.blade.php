@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ $date->format('d l F') }}</h1>
    </div>
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
                        <tr class="bg-success">
                            <td>{{ $product->name }}</td>
                            <td><input type="number" class="form-control" placeholder="x{{ $product->stock }}"></td>
                            <td><input type="number" class="form-control" placeholder="x1"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endforeach
@endsection
