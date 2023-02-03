<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Trip;
use \Carbon\Carbon;
use App\Models\Country;
use App\Models\Booking;
use App\Models\Location;
use App\Models\Type;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trips = Trip::get();
        $bookings = Booking::Get();
        $users = User::get();
        $revenue = 0.00;
        foreach ($bookings as $booking) {
        $revenue += (Carbon::parse($booking->startdate)->diffInDays(Carbon::parse($booking->enddate)) * $booking->trip->accomodation->cost); 
        }
        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            return view('admin.index', [
                'trips' => $trips,
                'users' => $users,
                'revenue' => $revenue,
                'bookings' => $bookings
            ]);
        }
    }
}
