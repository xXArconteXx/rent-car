<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Category;
class VehicleController extends Controller
{
    public function viewAll(){
        $categories = Category::all();
        $vehicles = Vehicle::paginate(12);
        return view('contentLayout.index', compact('vehicles', 'categories'));
    }

    public function adminVeh(){
        $categories = Category::all();
        $vehicles = Vehicle::paginate(12);
        return view('admin.vehicles.list', compact('vehicles', 'categories'));
    }

    public function adminVeh2(){
        $categories = Category::all();
        $vehicles = Vehicle::paginate(12);
        return view('admin.index', compact('vehicles', 'categories'));
    }

    public function index($id){
        $categories = Category::all();
        $ident = intval($id)-1;
        $vehicles = Vehicle::where('categories_id', $id)->paginate(12);
        return view('category.index', compact('vehicles', 'categories', 'ident'));
    }

    
}
