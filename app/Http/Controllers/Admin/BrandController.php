<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
  
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

 
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $brand = Brand::create($dataCreate);
        return redirect()->route('brands.index');
    }

   
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.show', compact('brand'));
    }


    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $dataUpdate = $request->all();
        $brand->update($dataUpdate);
        return redirect()->route('brands.index');
    }

 
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
