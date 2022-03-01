<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function new($nome, $stock, Category $category)
    {
        Product::create(['name' => $nome, "stock" => $stock, 'category_id' => $category->id]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
