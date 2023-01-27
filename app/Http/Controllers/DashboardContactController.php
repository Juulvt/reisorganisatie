<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactFormRequest;

class DashboardContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $contact = Contact::get();
        return view('admin.settings.contact', [
            'contact' => $contact->first()
        ]);
    }


    public function update(ContactFormRequest $request) 
    {
        $validated = $request->validated();

        if($validated) {
            $contact = Contact::updateOrCreate(
                ['id' => 1,],
                [
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'pinterest' => $request->pinterest,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin
                ]
            );
        }

        return redirect(route('admin.setting.contact'));
    }
}
