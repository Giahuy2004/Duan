<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.category.index', compact('categories'));
        
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $dataCreate = $request -> all();
        $category = Category::create($dataCreate);
        return redirect()->route('category.index');
    }

 
    public function show(string $id)
    {
        //
   
    }

 
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    
    }

   
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $dataUpdate = $request->all();
        $category->update($dataUpdate);
        return redirect()->route('category.index');
    }

 
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category -> delete();
        return redirect()->route('category.index');
    }
}
