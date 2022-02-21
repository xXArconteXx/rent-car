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

}
