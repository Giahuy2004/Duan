<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
 
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.products.index', compact('products'));
    }
 
    public function search(Request $request)
    {
        
    }

    public function create()
    {
        $categories = Category::get(['id', 'name']);
        $brands = Brand::get(['id', 'name']);
        return view('admin.products.store', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $dataCreate = $request->all();  
        
           if ($request->hasFile('images')) {
            $fileName = time() . '_' . $request->file('images')->getClientOriginalName();
            $path = $request->file('images')->storeAs('images', $fileName, 'public');
            $dataCreate['images'] = '/storage/' . $path;
        }
        $product = $this->product->create($dataCreate);
        $product->categories()->attach($dataCreate['category_id']);
        $product->brand()->associate($dataCreate['brand_id']);
        $product->save();
      
        return redirect()->route('products.index')->with('success', 'Thêm mới thành công');
    }


    // public function show(string $id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('product.show', compact('product'));
    // }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $dataUpdate = $request->all();

        if ($request->hasFile('images')) {
            $fileName = time() . '_' . $request->file('images')->getClientOriginalName();
            $path = $request->file('images')->storeAs('images', $fileName, 'public');
            $dataUpdate['images'] = '/storage/' . $path;

            if ($product->images) {
                $oldImagePath = public_path($product->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $product->update($dataUpdate);
        return redirect()->route('products.index');
    }
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product -> delete();
        return redirect()->route('products.index');
    }
}
