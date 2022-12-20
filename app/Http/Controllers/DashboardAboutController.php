<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutFormRequest;

class DashboardAboutController extends Controller
{
    public function edit()
    {
        $about = About::get();
        return view('admin.settings.about', [
            'about' => $about->first()
        ]);
    }

    public function update(AboutFormRequest $request) 
    {
        $validated = $request->validated();

        if($validated) {
            $about = About::updateOrCreate(
                [
                'id' => 1
                ],
                [
                'title' => $request->title,
                'description' => $request->description,
                'subtitle' => $request->subtitle,
                'text' => $request->subtitle,
                'image_path1' => $request->image_path1,
                'image_path2' => $request->image_path2,
                'image_path3' => $request->image_path3,
                'image_path4' => $request->image_path4,
                'image_path5' => $request->image_path5
                ]
            );
        }
    }

}
