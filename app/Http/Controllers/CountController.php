<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index()
    {
        return view('count', ['products' => Product::all()]);
    }
}
