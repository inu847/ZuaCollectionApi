<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;

class productController extends Controller
{
    public function index()
    {
        $product = new ProductResource(Product::get());
        return $product;
    }
}
