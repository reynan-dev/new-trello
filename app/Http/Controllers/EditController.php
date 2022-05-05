<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class EditController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::id());

        return view('edit', compact('user'));
    }


    // public function recup()
    //     {
    //         $user = DB::table('users')->select('name','email','password')->first();
    //         return view('edit')->with('user', $user);
    //     }

    public function update(Request $request)
    {

        $request->validate([
            'user_name' => 'required|unique:posts|max:255',
            'user_email' => 'required',
            'user_password' => 'required',

        
        ],);

        $user = Auth::user();
        $user->name = $request->input('user_name');

        $request->validate([
            "email_a" => "required|string|email:rfc,dns",
            "email_b" => "required|string|email:rfc,dns",
        ]);
        
        if ($request->input('email_a') === $request->input('email_b')) {
            $user->email = $request->input('email_a');
        }
        
        if ($request->input('user_password') !== null) {

            

            $user->password = Hash::make($request->input('user_password'));
        }

        $user->save();

        return redirect()->route('edit');
    }

}