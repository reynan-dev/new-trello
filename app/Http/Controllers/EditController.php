<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class EditController extends Controller
{
    // public function recup()
    //     {
    //         $user = DB::table('users')->select('name','email','password')->first();
    //         return view('edit')->with('user', $user);
    //     }

    public function update(Request $request, $id)
    {

        /*$request->validate([
            'user_name' => 'required|unique:posts|max:255',
            'user_email' => 'required',
            'user_password' => 'required',

        
        ],);*/

        $user = User::findOrFail($id);

        if ($request->input('name') !== null && $request->input('name') !== $user->name){
            $user->name = $request->input('name');
            $user->save();
                return redirect()->route('user.edit', $user->id);
        }


        /*$request->validate([
            "email_a" => "required|string|email:rfc,dns",
            "email_b" => "required|string|email:rfc,dns",
        ]);*/
        
        if ($request->input('new-email') !== null && $request->input('new-email') === $request->input('confirm-email')) {            
            $validation_password = true;

            if(password_verify($request->input('current-password'), $user->password) !== true) {
                $validation_password = false;
            }
            
            $user->email = $request->input('new-email');
            $user->password = $user->password;

            $user->save();
            return redirect()->route('user.edit', $user->id);

        }
        
        if ($request->input('new-password') !== null  && $request->input('new-password') === $request->input('confirm-password')) {

            $validation_password = true;

            if(password_verify($request->input('current-password'), $user->password) !== true) {

                $validation_password = false;
            }

            if ($validation_password === true){

                $user->email = $user->email;
                $user->password = Hash::make($request->input('new-password'));

                $user->save();
                return redirect()->route('user.edit', $user->id);
            }
        }

        return redirect()->route('user.edit', $user->id);
    }

}