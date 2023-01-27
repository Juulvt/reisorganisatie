<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Requests\AttributeFormRequest;

class DashboardAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::get();

        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            return view('admin.attributes.index', [
                'attributes' => $attributes
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
            $attributes = Attribute::get();
            return view('admin.attributes.create', [
                'attributes' => $attributes
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeFormRequest $request)
    {
        $validated = $request->validated();

        if($validated) {
            $attribute = Attribute::create([
                'description' => $request->description
            ]);
        }

        return redirect(route('admin.attribute.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributes = Attribute::get();
        return view('admin.attributes.edit', [
            'attribute' => Attribute::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeFormRequest $request, $id)
    {
        $attribute = Attribute::where('id', $id)->update([
            'description' => $request->description
        ]);

        return redirect(route('admin.attribute.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::destroy($id);
        return redirect(route('admin.attribute.index'))->with('message', 'Attribute has been deleted');
    }
}
