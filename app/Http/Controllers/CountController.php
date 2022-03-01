<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;

class CountController extends Controller
{
    public function index()
    {
        return view('counts', [
            'date' => Carbon::now(),
            'products' => Product::all()
        ]);
    }
}
