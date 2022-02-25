<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Vehicle;
use App\Models\Rent;
use App\Models\User;
use App\Models\Penalty;

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

    public function myRents()
    {
        $categories = Category::all();
        $user = Auth::user();
        // dd($user);
        $rents = Rent::where('user_id', $user->id)->get();
        return view('content-layout.my-list-rents', compact('rents', 'categories'));
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
        // $subsDays = $request->date_end->floatDiffInDays($resquest->date_start);
        // $cost = $subsDays * $resquest->vehicle->price;
        // $costFormat = round($cost, 2);
        // dd($date1, $date2, $user_id, $vehicle_id);

        Rent::create([
            "date_start" => $date1,
            "date_end" => $date2,
            "user_id" => $user_id,
            "vehicle_id" => $vehicle_id,
            "status" => "expectation",
        ]);

        $vehicle = Vehicle::where("id", "=", "$vehicle_id")->update(['available'=>0]);
        // dd($vehicle);
        
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
        // dd($rent);
        if ($rent->date_give != null) {
            // dd($rent->date_end);
            if ($rent->date_give->equalTo($rent->date_end) || $rent->date_give->lessThan($rent->date_end) || $rent->penalty) {
                $subsDays = $rent->date_end->floatDiffInDays($rent->date_start);
                $cost = $subsDays * $rent->vehicle->price;
                $costFormat = round($cost, 2);
                // dd($costFormat);
                $rent->update([
                    'cost' => $costFormat,
                ]);
                return redirect(route('rent.list', compact('categories')));
            }
            $subsDays = $rent->date_give->floatDiffInDays($rent->date_end);
            $cost = $subsDays * (($rent->vehicle->price * 0.1) + $rent->vehicle->price);
            $costFormat = round($cost, 2);
            // dd($costFormat);
            Penalty::create([
                'cost' => $costFormat,
                'additional_comments' => 'Days Later' . round($subsDays, 2),
                'rent_id' => $rent->id,
            ]);
            return redirect(route('rent.list', compact('categories')));
        }
    }

    public function destroyer(Rent $rent)
    {
        $categories = Category::all();
        $rent->delete();
        return redirect(route('rent.list', compact('categories')));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // dd($request->search);
        if($request->search!=null) {
            $id = User::where("email", "LIKE", "%{$request->get('search')}%")->first('id');
            // dd($id->id);
            $rents = Rent::where("user_id", "=", $id->id)->paginate(10);
            // dd($rents);
            return view('admin.rentings.list', compact('rents', 'categories'));
        }
        return back();        
    }
}
