<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Trip;
use App\Models\Country;
use App\Models\Review;
use App\Models\Type;
use App\Http\Requests\BookingFormRequest;

class TripController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::get();
        $types = Type::get();

        return view('index', [
            'trips' => Trip::latest()->filter(request(['country', 'type']))->orderBy('updated_at', 'desc')->paginate(6),
            'countries' => $countries,
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingFormRequest $request)
    {
        $validated = $request->validated();

        if($validated) {
            $booking = Booking::create([
                'trip_id' => $request->trip_id,
                'user_id' => $request->user()->id,
                'startdate' => $request->startdate,
                'enddate' => $request->enddate,
                'status' => 'active'
            ]);
        }

        return redirect(route('user.trips'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countries = Country::get();
        $types = Type::get();
        $trip = Trip::findOrFail($id);

        $reviews = Review::get()->where('trip_id', $trip->id);
        return view('show', [
            'trip' => $trip,
            'countries' => $countries,
            'types' => $types,
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
