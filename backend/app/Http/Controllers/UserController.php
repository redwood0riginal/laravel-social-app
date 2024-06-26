<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
            'username' => ['required'],
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

    public function logout(){
        if (auth()->check()){
            auth()->logout();
            return redirect('/')->with('success','Loged out successfully ');
        };
    }

    public function showProfile(User $user, Post $post) {
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('content.profile', compact('posts', 'user'));
    }

    public function showLikedPosts(User $user) {
        $likedPostIds = Like::where('user_id', $user->id)->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $likedPostIds)->orderByDesc('created_at')->get();
        return view('content.liked-posts', compact('posts', 'user'));
    }

    public function showProfileForm(User $user){
        if ($user->id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('content.profile-form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $formFields = $request->validate([
            'full_name' => '',
            'username' => [Rule::unique('users')->ignore($user)],
            'description' => 'max:255',
            'birthdate' => '',
            'gender' => 'required|in:male,female',
            'address' => '',
        ]);

        // Ensure the authenticated user can only update their own profile
        if ($user->id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Handle Thumbnail Image
        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg|max:8000',
            ]);

            // Generate a unique filename for the thumbnail image
            $thumbnailName = $user->id . '-' . uniqid() . '.' . $request->file('thumbnail')->getClientOriginalExtension();

            // Store the thumbnail image
            $thumbnailPath = $request->file('thumbnail')->storeAs('public/thumbnailImages', $thumbnailName);

            $user->thumbnail = $thumbnailName;
        }

        // Handle Profile Image
        if ($request->hasFile('profile')) {
            $request->validate([
                'profile' => 'image|mimes:jpeg,png,jpg|max:8000',
            ]);

            // Generate a unique filename for the profile image
            $profileName = $user->id . '-' . uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();

            // Store the profile image
            $profilePath = $request->file('profile')->storeAs('public/profileImages', $profileName);

            $user->profile = $profileName;
        }

        // Update user profile
        $user->update($formFields);

        return redirect()->route('profile.show',$user->id)->with('success', 'Profile successfully updated');
    }


    public function followings(User $user){
        $followings = $user->followings()->get();
        return view('content.followings-users', compact('followings','user'));
    }

    public function followers(User $user){
        $followers = $user->followers()->get();
        return view('content.followers-users', compact('followers', 'user'));
    }

    public function search(Request $request)
{
    $searchQuery = $request->search;

    if(empty($searchQuery)) {
        return response()->json([]);
    }

    $data = User::where('username', 'like', '%' . $searchQuery . '%')
                ->orWhere('full_name', 'like', '%' . $searchQuery . '%')
                ->get();

    $output = '';
    if (count($data) > 0) {
        foreach ($data as $row) {
            $output .= '

            <div class="sidebar-profile">
                <a href="'.route('profile.show',$row->id).'"><img src="'.asset($row->profile).'" alt=""></a>
                <div class="sidebar-profile-info">
                <a href="'.route('profile.show',$row->id).'"><p class="name">'.$row->full_name.'</p></a>
                <a href="'.route('profile.show',$row->id).'"><p class="username">'.$row->username.'</p></a>
                </div>
            </div>
            ';
        }
    } else {
        $output .= '<div class="no-results">No results for <span>"'.$searchQuery.'"</span> <br> <p>Try searching for something else</p> </div>';
    }

    return response()->json($output);
}
}
