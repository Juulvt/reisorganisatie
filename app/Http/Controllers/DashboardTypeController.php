<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Requests\TypeFormRequest;

class DashboardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::get();

        if (! Gate::allows('view-dashboard')) {
            abort(403);
        } else {
            return view('admin.types.index', [
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
            $types = Type::get();
            return view('admin.types.create', [
                'types' => $types
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeFormRequest $request)
    {
        $validated = $request->validated();

        if($validated) {
            $type = Type::create([
                'name' => $request->name,
            ]);
        }

        return redirect(route('admin.type.index'));
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
        $types = Type::get();
        return view('admin.types.edit', [
            'type' => Type::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeFormRequest $request, $id)
    {
        $type = Type::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect(route('admin.type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::destroy($id);
        return redirect(route('admin.type.index'))->with('message', 'Type has been deleted');
    }
}
