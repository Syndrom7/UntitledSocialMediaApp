<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserController extends Controller
{
    public function index() {
        return view('settings');
    }

    public function update(Request $request) {
        $users = User::find($request->id);
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->occupation = $request->occupation;
        $users->address = $request->address;
        $users->birthday = $request->birthday;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->save();
        return redirect('settings')->with(['notify' => 'Your changes have been successfully saved!']);
    }

    public function destroy(Request $request) {
        $users = User::find(Auth::user()->id);
        $users->delete();
        return redirect('login')->with(['notify' => 'User deleted successfuly.']);
    
    }
}

