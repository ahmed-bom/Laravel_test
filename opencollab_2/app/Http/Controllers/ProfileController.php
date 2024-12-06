<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function upload(Request $request)
{
    $request->validate([
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = $request->user();

    // Delete existing profile picture if it exists
    if ($user->profile_picture) {
        $oldFilePath = public_path('uploads/profile-pics/' . $user->profile_picture);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
    }

    // Upload new profile picture
    $file = $request->file('profile_pic');
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads/profile-pics'), $filename);

    // Update user's profile picture
    $user->profile_picture = $filename;
    $user->save();

    return back()->with('success', 'Profile picture updated successfully.');
}

}
