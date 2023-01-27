<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Country;
use App\Models\Image;
use App\Models\ImageLocation;
use App\Models\Location;
use App\Http\Requests\LocationFormRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            $countries = Country::get();
            $locations = Location::get();
            return view('admin.locations.index', [
                'locations' => $locations,
                'countries' => $countries
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
            return view('admin.locations.create', [
                'countries' => $countries
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationFormRequest $request)
    {

        $validated = $request->validated();

        if($validated) {
            $location = Location::create([
                'name' => $request->name,
                'description' => $request->description,
                'country_id' => $request->country
            ]);
            
            $images = array($request->image1, $request->image2, $request->image3, $request->image4);
            foreach ($images as $key => $image) {
                $imagerow = Image::create([
                    'image_path' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $image, $key)))),
                    'order' => $key
                ]);

                ImageLocation::create([
                    'location_id' => $location->id,
                    'image_id' => $imagerow->id,
                ]);
            }
        }

        return redirect(route('admin.location.index'));
    }

    public function storeImage($request, $image, $iteration) {
        $newImageName = uniqid() . '-' . $request->name . $iteration .'.' . $image->extension();
        
        return $image->move(public_path('images/locations'), $newImageName);
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
            $location = Location::findOrFail($id);
            return view('admin.locations.location', [
                'location' => $location
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
        return view('admin.locations.edit', [
            'location' => Location::where('id', $id)->first(),
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationFormRequest $request, $id)
    {   
        $location = Location::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'country_id' => $request->country
        ]);
        
        $images = array($request->image1, $request->image2, $request->image3, $request->image4);
        foreach ($images as $key => $image) {
            if($image != null) {
                Location::where('id', $id)->each(function ($locationobj) use ($image, $key, $request) {
                    $imageid = $locationobj->images()->where('order', $key)->first()->id;
                    $imagerow = Image::where('id',$imageid)->update([
                        'image_path' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $image, $key)))),
                    ]);
                });
            }
        }

        return redirect(route('admin.location.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::destroy($id);
        return redirect(route('admin.location.index'))->with('message', 'Location has been deleted');
    }
}
