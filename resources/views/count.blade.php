@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Tugurio') }}</div>

        <div class="card-body">
            <table class="table">

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td><input type="number" class="form-control" placeholder="x{{$product->stock}}"></td>
                        <td><input type="number" class="form-control" placeholder="x1"></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
