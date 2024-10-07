<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.user.index', compact('users'));
    }

 
    public function create()
    {
        return view('admin.user.create');
    }

 
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $user = User::create($dataCreate);
        return redirect()->route('use.index');
    }

   
    public function profile()
    {
        $user = auth()->user();
        dd($user);
        return view('profile', compact('user'));
    }
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
  
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $dataUpdate = $request->all();
        $user->update($dataUpdate);
        return redirect()->route('use.index');
    }

  
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('use.index');
    }
}
