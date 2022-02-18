<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function adminUser(){
        $users = User::paginate(12);
        return view('admin.users.list', compact('users'));
    }
}
