<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;

class UsersController extends Controller
{
    function index()
    {
        return view('users.index')->with('users',User::all());
    }


    function makeAdmin($id)
    {
        $user = User::find($id);
        if($user->isAdmin())
        {
            $user->role='writer';
        }
        else{
             $user->role = 'admin';
          }
        $user->update();
        
        
        return redirect(route('users.index'));
    }

    public function edit()
    {

        return view('users.edit')->with('user',auth()->user());
    }


    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $image = $request->image->store('users');
        $user->update([
            'name'=>request('name'),
            'about'=>request('about'),
            'image'=>$image,
        ]);

        session()->flash('success','User updated successfully.');
        return back();

    }
}

