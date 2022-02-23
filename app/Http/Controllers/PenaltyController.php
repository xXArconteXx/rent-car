<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use Illuminate\Http\Request;
use App\Models\Category;

class PenaltyController extends Controller
{
    public function show(){
        $categories = Category::all();
        $penalties = Penalty::paginate(12);
        return view('admin.penalties.list', compact('penalties', 'categories'));
    }
}
