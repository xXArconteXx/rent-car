<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index(){

    }

    public function create(){
        if(Auth::user() != null && Auth::user()->hasRole('client')){
            if(Auth::user()->hasRole('client')){
                return view('content-layout.form');
            }
        }else {
            return redirect(route('home'));
        }
    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
