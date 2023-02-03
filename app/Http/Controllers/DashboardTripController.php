<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Trip;
use App\Models\Accomodation;
use App\Models\Country;
use App\Models\Location;
use App\Models\Type;
use App\Models\Image;
use App\Models\ImageTrip;
use App\Models\Attribute;
use App\Models\AttributeTrip;
use App\Models\User;
use App\Http\Requests\TripFormRequest;
use Illuminate\Http\Request;

class DashboardTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::orderBy('updated_at', 'desc')->paginate(5);
        $countries = Country::get();
        $locations = Location::get();
        $types = Type::get();

        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            return view('admin.trips.index', [
                'trips' => $trips,
                'countries' => $countries,
                'locations' => $locations,
                'types' => $types
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            $countries = Country::get();
            $locations = Location::get();
            $types = Type::get();
            $attributes = Attribute::get();
            return view('admin.trips.create', [
                'countries' => $countries,
                'locations' => $locations,
                'types' => $types,
                'attributes' => $attributes
            ]);
        }
    }

    public function storeImage($request, $image, $iteration) {
        $newImageName = uniqid() . '-' . explode(' ',trim($request->title))[0] . $iteration .'.' . $image->extension();
        
        return $image->move(public_path('images/trips'), $newImageName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripFormRequest $request)
    {
        $validated = $request->validated();

        if($validated) {
            $accomodation = Accomodation::create([
                'name' => $request->name,
                'description' => $request->description,
                'city' => $request->city,
                'address' => $request->address,
                'min_amount_visitors' => $request->minvisitors,
                'max_amount_visitors' => $request->maxvisitors,
                'cost' => $request->price,
                'location_id' => $request->location,
                'type_id' => $request->type
            ]);

            $trip = Trip::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'active',
                'accomodation_id' => $accomodation->id
            ]);
            
            $images = array($request->image1, $request->image2);
            foreach ($images as $key => $image) {
                $imagerow = Image::create([
                    'image_path' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $image, $key)))),
                    'order' => $key
                ]);

                ImageTrip::create([
                    'trip_id' => $trip->id,
                    'image_id' => $imagerow->id,
                ]);
            }

            foreach ($request->input('attribute') as $attribute) {
                AttributeTrip::create([
                    'attribute_id' => $attribute,
                    'trip_id' => $trip->id
                ]);
            }
        }

        return redirect(route('admin.trip.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            $trip = Trip::findOrFail($id);
            return view('admin.trips.trip', [
                'trip' => $trip
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::get();
        $locations = Location::get();
        $types = Type::get();
        $attributes = Attribute::get();
        return view('admin.trips.edit', [
            'trip' => Trip::where('id', $id)->first(),
            'countries' => $countries,
            'locations' => $locations,
            'types' => $types,
            'attributes' => $attributes
        ]);
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

        Trip::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active'
        ]);

        $trip = Trip::findOrFail($id);
        $accomodation = Accomodation::where('id', '=', $trip->accomodation_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'city' => $request->city,
            'address' => $request->address,
            'min_amount_visitors' => $request->minvisitors,
            'max_amount_visitors' => $request->maxvisitors,
            'cost' => $request->price,
            'location_id' => $request->location,
            'type_id' => $request->type
        ]);
        
        $images = array($request->image1, $request->image2);
        foreach ($images as $key => $image) {
            if($image != null) {
                Trip::where('id', $id)->each(function ($tripobject) use ($image, $key, $request) {
                    $imageid = $tipobject->images()->where('order', $key)->first()->id;
                    Storage::disk('public')->delete(Image::get()->where('id', '=', $imageid));
                    $imagerow = Image::where('id',$imageid)->update([
                        'image_path' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $image, $key)))),
                    ]);
                });
            }
        }

        AttributeTrip::where('trip_id', $id)->delete();
        foreach ($request->input('attribute') as $attribute) {
            AttributeTrip::create([
                'attribute_id' => $attribute,
                'trip_id' => $id
            ]);
        }

        return redirect(route('admin.trip.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        Trip::destroy($id);
        Accomodation::destroy($trip->accomodation_id);
        return redirect(route('admin.trip.index'))->with('message', 'Trip has been deleted');
    }
}
