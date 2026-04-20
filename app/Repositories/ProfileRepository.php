<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository
{
    public function getFirst(): Profile
    {
        return Profile::first() ?? new Profile();
    }

    public function updateOrCreate(array $data): Profile
    {
        $profile = $this->getFirst();
        $profile->fill($data);
        $profile->save();
        return $profile;
    }
}
