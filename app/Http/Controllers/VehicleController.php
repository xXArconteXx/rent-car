<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function viewAll()
    {
        $categories = Category::all();
        $vehicles = Vehicle::paginate(12);
        return view('content-layout.index', compact('vehicles', 'categories'));
    }

    public function adminVeh()
    {
        $categories = Category::all();
        $vehicles = Vehicle::paginate(12);
        return view('admin.vehicles.list', compact('vehicles', 'categories'));
    }

    public function index($id)
    {
        $categories = Category::all();
        $ident = intval($id) - 1;
        $vehicles = Vehicle::where('categories_id', $id)->paginate(12);
        return view('category.index', compact('vehicles', 'categories', 'ident'));
    }

    public function show(Vehicle $vehicle)
    {
        $categories = Category::all();
        if (Auth::user() != null && $vehicle->rent != null) {
            if ($vehicle->rent->user_id == Auth::user()->id) {
                return redirect(route('my-rents', compact('categories')));
            } else {
                return Redirect::back()->withErrors(['msg' => 'The Vehicle '.$vehicle->model.' Its Already rent']);
            }
        }

        //dd == varDump on Laravel
        // dd($vehicle);
        return view('content-layout.show-vehicle', compact('vehicle', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.vehicles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = Category::all();
        Vehicle::create($request->all());
        return redirect(route('vehicle.list', compact('categories')));
    }

    //function for open the form vehicle when give all vehicle parameters
    public function edit(Vehicle $vehicle)
    {
        // dd($vehicle);
        $categories = Category::all();
        return view('admin.vehicles.edit', compact('vehicle', 'categories'));
    }

    //function for change the vehicle parameters on de data base
    public function update(Request $request, Vehicle $vehicle)
    {
        // dd($request->all(), $vehicle);
        $categories = Category::all();
        $vehicle->update($request->all());
        return redirect(route('vehicle.list', compact('categories')));
    }

    public function destroyer(Vehicle $vehicle)
    {
        $categories = Category::all();
        $vehicle->delete();
        return redirect(route('vehicle.list', compact('categories')))->with('delete', 'ok');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // dd($request->search);
        if($request->search!=null) {
            $vehicles = Vehicle::where("model", "LIKE", "%{$request->get('search')}%")->paginate(10);
            return view('admin.vehicles.list', compact('vehicles', 'categories'));
        }
        return back();        
    }

    public function searchIndex(Request $request)
    {
        $categories = Category::all();
        // dd($request->search);
        if($request->search!=null) {
            $vehicles = Vehicle::where("model", "LIKE", "%{$request->get('search')}%")->paginate(10);
            return view('content-layout.index', compact('vehicles', 'categories'));
        }
        return back();
    }
}
