<?php

namespace App\Services;

use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    public function __construct(
        protected ProfileRepository $repository
    ) {}

    public function getProfile()
    {
        return $this->repository->getFirst();
    }

    public function updateProfile(array $data)
    {
        $profile = $this->repository->getFirst();

        if (isset($data['avatar'])) {
            if ($profile->avatar_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $profile->avatar_url));
            }
            $path = $data['avatar']->store('avatars', 'public');
            $data['avatar_url'] = '/storage/' . $path;
        }

        return $this->repository->updateOrCreate($data);
    }
}
