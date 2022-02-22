<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Rent;


class RentController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('content-layout.acknowledge', compact('categories'));
    }

    public function adminRent()
    {
        $categories = Category::all();
        $rents = Rent::paginate(12);
        return view('admin.rentings.list', compact('rents', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        if (Auth::user() != null && Auth::user()->hasRole('client')) {
            if (Auth::user()->hasRole('client')) {
                return view('content-layout.form', compact('categories'));
            }
        } else {
            return redirect(route('home'));
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->from.' '.$request->pickupTime);
        $date1 = Carbon::createFromFormat('m/d/Y H:i', $request->from . ' ' . $request->pickupTime);
        $date2 = Carbon::createFromFormat('m/d/Y H:i', $request->to . ' ' . $request->dropoffTime);
        $user_id = Auth::user()->id;
        $vehicle_id = intval($request->vehicle_id);
        // dd($date1, $date2, $user_id, $vehicle_id);

        Rent::create([
            "date_start" => $date1,
            "date_end" => $date2,
            "user_id" => $user_id,
            "vehicle_id" => $vehicle_id,
        ]);
        return redirect(route('acknowledge'));
    }

    public function edit(Rent $rent)
    {
        // dd($vehicle);
        $categories = Category::all();
        return view('admin.rentings.edit', compact('rent', 'categories'));
    }

    public function update(Request $request, Rent $rent)
    {
        // Vehicle::
        // dd($request->all(), $vehicle);
        $categories = Category::all();
        $rent->update($request->all());
        return redirect(route('rent.list', compact('categories')));
    }

    public function destroyer(Rent $rent)
    {
        $categories = Category::all();
        $rent->delete();
        return redirect(route('rent.list', compact('categories')));
    }
}
