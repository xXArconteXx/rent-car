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
        return view('content-layout.index', compact('vehicles', 'categories'));
    }

    public function adminVeh(){
        $categories = Category::all();
        $vehicles = Vehicle::paginate(12);
        return view('admin.vehicles.list', compact('vehicles', 'categories'));
    }

    public function index($id){
        $categories = Category::all();
        $ident = intval($id)-1;
        $vehicles = Vehicle::where('categories_id', $id)->paginate(12);
        return view('category.index', compact('vehicles', 'categories', 'ident'));
    }

    public function show(Vehicle $vehicle){
        $categories = Category::all();
        //dd == varDump on Laravel
        // dd($vehicle);
        return view('content-layout.show-vehicle', compact('vehicle', 'categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.vehicles.create', compact('categories'));
    }

    public function store(Request $request){
        $categories = Category::all();
        Vehicle::create($request->all());
        return redirect(route('vehicle.list', compact('categories')));
    }

    //function for open the form vehicle when give all vehicle parameters
    public function edit(Vehicle $vehicle){
        // dd($vehicle);
        $categories = Category::all();
        return view('admin.vehicles.edit', compact('vehicle', 'categories'));
    }

    //function for change the vehicle parameters on de data base
    public function update(Request $request, Vehicle $vehicle){
        // Vehicle::
        // dd($request->all(), $vehicle);
        $vehicle->update($request->all());
    }

    public function destroyer(Vehicle $vehicle)
    {
        $categories = Category::all();
        $vehicle->delete();
        return redirect(route('vehicle.list', compact('categories')));
    }
}
