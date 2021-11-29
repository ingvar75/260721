<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'min:3|required_with:repeatPassword|same:repeatPassword',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users',
            'password' => function ($attribute, $value, $fail) use ($request, $user) {
                $isValidPassword = !empty($user) && Hash::check($request->get('password'), $user->password);
                if (!$isValidPassword) {
                    $fail('Email or password is invalid');
                }
            },
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
