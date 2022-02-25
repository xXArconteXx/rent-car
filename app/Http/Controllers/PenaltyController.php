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

    public function edit(Penalty $penalty){
        // dd($vehicle);
        $categories = Category::all();
        return view('admin.penalties.edit', compact('penalty', 'categories'));
    }

    public function update(Request $request, Penalty $penalty){
        $categories = Category::all();
        $penalty->update($request->all());
        return redirect(route('penalty.list', compact('categories')));
    }

    public function destroyer(Penalty $penalty)
    {
        $categories = Category::all();
        $penalty->delete();
        return redirect(route('penalty.list', compact('categories')));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // dd($request->search);
        if($request->search!=null) {
            $penalties = Penalty::where("id", "LIKE", "%{$request->get('search')}%")->paginate(10);
            return view('admin.penalties.list', compact('penalties', 'categories'));
        }
        return back(); 
    }
}
