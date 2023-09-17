<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->first();

        return view('modules.profiles.index', compact('users'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = $request->input('password') <= 0 ? $data->password : bcrypt($request->input('password'));
        $data->save();

        if ($request->hasFile('image')) {
            $data->addMediaFromRequest('image')
                ->toMediaCollection('profiles');
        }

        return back()->with('message', 'Perfil actualizado exitosamente');
    }
}
