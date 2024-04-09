<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        $formFields = $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('success', 'user successfully created');
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required'
        ]);

        if (auth()->attempt(['email' => $formFields['userEmail'], 'password' => $formFields['userPassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Loged in successfully!!');
        } else {
            return redirect('login-form')->with('error', 'wrong email or password');
        }
    }

    public function showProfile(User $user) {
        return view('layouts.layout', compact('user'));
    }

    public function showProfileForm(User $user){
        if ($user->id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('layouts.layout', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $formFields = $request->validate([
        'full_name' => ['required'],
        'username' => ['required'],
        'thumbnail' => ['mimes:jpeg,png,jpg,gif'],
        'profile'=> ['mimes:jpeg,png,jpg,gif'],
        'description' => ['max:255'],
        'birthdate' => ['date'],
        'gender' => 'required|in:male,female',
        'address' => [""],
    ]);

    // Ensure the authenticated user can only update their own profile
    if ($user->id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    // Check if media content is uploaded
    if ($request->hasFile('thumbnail') && $request->hasFile('profile')) {
        $thumbnailname = $user->id . '-' . uniqid() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
        $profilename = $user->id . '-' . uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();

        // Store the media content
        $request->file('thumbnail')->storeAs('public/thumbnailImages', $thumbnailname);
        $request->file('profile')->storeAs('public/profileImages', $profilename);

        // Update the media content filename in the form fields
        $formFields['thumbnail'] = $thumbnailname;
        $formFields['profile'] = $profilename;
    }

    // Update user profile
    $user->update($formFields);

    return redirect('/profile')->with('success', 'Profile successfully updated');
}

}
