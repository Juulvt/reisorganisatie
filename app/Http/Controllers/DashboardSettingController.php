<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Terms;
use App\Models\Privacy;
use App\Http\Requests\SettingFormRequest;

class DashboardSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $privacy = Privacy::get();
        $terms = Terms::get();
        return view('admin.settings.privacyandterms', [
            'privacy' => $privacy->first(),
            'terms' => $terms->first()
        ]);
    }


    public function update(SettingFormRequest $request) 
    {
        $validated = $request->validated();

        if($validated) {
            $privacy = Privacy::updateOrCreate(
                ['id' => 1,],
                [
                'description' => $request->privacy
                ]
            );
            $terms = Terms::updateOrCreate(
                ['id' => 1,],
                [
                'description' => $request->terms
                ]
            );
        }

        return redirect(route('admin.setting.privacy'));
    }
}
