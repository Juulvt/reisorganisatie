<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Trip;
use App\Models\Country;
use App\Models\Location;
use App\Models\Type;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trips = Trip::get();
        $users = User::get();
        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            return view('admin.index', [
                'trips' => $trips,
                'users' => $users
            ]);
        }
    }
}
