<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first() ?? new Profile();
        
        return Inertia::render('Admin/Profile/Edit', [
            'profile' => $profile
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'email' => 'nullable|email',
            'avatar' => 'nullable|image|max:2048',
            'avatar_url' => 'nullable|string'
        ]);

        $profile = Profile::first() ?? new Profile();

        if ($request->hasFile('avatar')) {
            if ($profile->avatar_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $profile->avatar_url));
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar_url'] = '/storage/' . $path;
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()->back()->with('message', 'Profile updated successfully.');
    }
}
