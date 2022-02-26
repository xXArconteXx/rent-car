<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    public function adminUser(){
        $categories = Category::all();
        $users = User::paginate(12);
        return view('admin.users.list', compact('users', 'categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.users.create', compact('categories'));
    }

    public function store(Request $request){
        $categories = Category::all();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ])->assignRole('client');
        // $request['password']=bcrypt($request['password']);
        // User::create($request);
        return redirect(route('user.list', compact('categories')));
    }

    public function edit(User $user){
        // dd($vehicle);
        $categories = Category::all();
        return view('admin.users.edit', compact('user', 'categories'));
    }

    public function update(Request $request, User $user){
        $categories = Category::all();
        $user->update($request->all());
        return redirect(route('user.list', compact('categories')));
    }

    public function destroyer(User $user)
    {
        $categories = Category::all();
        $user->delete();
        return redirect(route('user.list', compact('categories')))->with('delete', 'ok');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // dd($request->search);
        if($request->search!=null) {
            $users = User::where("name", "LIKE", "%{$request->get('search')}%")->paginate(10);
            return view('admin.users.list', compact('users', 'categories'));
        }
        return back(); 
    }

}
