<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Services\ProfileService;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function __construct(
        protected ProfileService $service
    ) {}

    public function edit()
    {
        return Inertia::render('Admin/Profile/Edit', [
            'profile' => $this->service->getProfile()
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $this->service->updateProfile($request->validated());

        return redirect()->back()->with('message', 'Profile updated successfully.');
    }
}
