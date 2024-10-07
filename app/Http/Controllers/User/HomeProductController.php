<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index() 
    {
        $products = $this->product->latest()->paginate(5);
        return view('index', compact('products'));
    }
    public function show($id) 
    {
        $product = $this->product->findOrFail($id);
        return view('product.show', compact('product'));
    }
}
