<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AccountFormRequest;

class UserAccountController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $user = auth()->user();

        return view('user.account', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($request->image != null) {
            User::where('id', $id)->update([
                    'image_path' => str_replace('\\', '/',(str_replace(public_path(),'', $this->storeImage($request, $request->image)))),
            ]);
        }

        return redirect(route('user.account'));
    }

    public function storeImage($request, $image) {
        $newImageName = uniqid() . '-' . explode(' ',trim($request->title))[0] .'.' . $image->extension();
        
        return $image->move(public_path('images/users'), $newImageName);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return redirect(route('index.index'));
    }
}
