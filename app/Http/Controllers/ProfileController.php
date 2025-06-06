<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
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
    $user = $request->user();

    // ✅ validate করা ডেটা fill করো (image বাদে)
    $user->fill($request->safe()->except('image'));

    // ✅ ইমেজ আপলোড হ্যান্ডলিং
    if ($request->hasFile('image')) {
        // পুরনো ছবি থাকলে মুছে ফেলো
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // নতুন ছবি সেভ করো
        $path = $request->file('image')->store('profile_images', 'public');
        $user->image = $path;
    }

    // ✅ ইমেইল চেঞ্জ হলে verify null করো
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // ✅ ফাইনালি সেভ করো
    $user->save();

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
}
