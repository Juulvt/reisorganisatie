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
                ['id' => 1,],
                [
                'title' => $request->title,
                'description' => $request->description,
                'subtitle' => $request->subtitle,
                'text' => $request->text,
                ]
            );

            if ($request->image_path1 != null) {
                $about = About::updateOrCreate(
                    ['id' => 1,],
                    [
                        'image_path1' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $request->image_path1, 1)))),
                    ]
                    );
            }

            if ($request->image_path2 != null) {
                $about = About::updateOrCreate(
                    ['id' => 1,],
                    [
                        'image_path2' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $request->image_path2, 2)))),
                    ]
                    );
            }

            if ($request->image_path3 != null) {
                $about = About::updateOrCreate(
                    ['id' => 1,],
                    [
                        'image_path3' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $request->image_path3, 3)))),
                    ]
                    );
            }

            if ($request->image_path4 != null) {
                $about = About::updateOrCreate(
                    ['id' => 1,],
                    [
                        'image_path4' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $request->image_path4, 4)))),
                    ]
                    );
            }

            if ($request->image_path5 != null) {
                $about = About::updateOrCreate(
                    ['id' => 1,],
                    [
                        'image_path5' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $request->image_path5, 5)))),
                    ]
                    );
            }
        }

        return redirect(route('admin.setting.about'));
    }

    public function storeImage($request, $image, $iteration) {
        $newImageName = uniqid() . '-' . explode(' ',trim($request->title))[0] . $iteration .'.' . $image->extension();
        
        return $image->move(public_path('images/location'), $newImageName);
    }

}
