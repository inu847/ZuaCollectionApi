<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ShowProduct as ShowProductResource;

class productController extends Controller
{
    public function index()
    {
        $product = new ProductResource(Product::paginate(6));
        
        return $product;
    }

    public function show($id)
    {
        $product = new ShowProductResource(Product::find($id));

        return $product;
    }
}
