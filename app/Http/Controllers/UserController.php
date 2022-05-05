<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('user.edit');
    }

    public function update(Request $request, $id)
    {

        /* $request()->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); */

        $user = User::findOrFail($id);


        $img = $request->file('cover_app');

        if ($img !== null){

            $destination_path = public_path('/image/user-' . $id.'/'); // upload path

            // merda que eu fiz pra funcionar em localhost
                $dest_array = explode('/', $destination_path);
                unset($dest_array[0], $dest_array[1], $dest_array[2], $dest_array[3], $dest_array[4], $dest_array[5], $dest_array[6]);

                $new_destination = implode('/', $dest_array);
            // fim da merda que eu fiz pra funcionar em localhost
                
            // Upload Orginal Image
            $cover_img = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destination_path, $cover_img);

            // Save In Database

            $user->cover_app = $new_destination.$cover_img;
            $user->save();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->cover_app = $request->input('cover_app');
        return redirect()->route('app.index');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validation_password = true;

        if(password_verify($request->input('password'), $user->password) !== true) {
            $validation_password = false;
        }

        if ($validation_password === true){
            $user->delete();
        }
        return redirect()->route('register')->with('Votre compte est bien supprimé.');
    }


    public function remove(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->cover_app = $request->file('cover_app');
        $user->save();

        return redirect()->route('app.index');
    }

}
