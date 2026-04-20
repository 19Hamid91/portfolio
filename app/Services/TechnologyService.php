<?php

namespace App\Services;

use App\Models\Technology;
use App\Repositories\TechnologyRepository;
use Illuminate\Support\Facades\Storage;

class TechnologyService
{
    public function __construct(
        protected TechnologyRepository $repository
    ) {}

    public function getAllTechnologies()
    {
        return $this->repository->getAll();
    }

    public function createTechnology(array $data)
    {
        if (isset($data['icon'])) {
            $path = $data['icon']->store('icons', 'public');
            $data['icon_url'] = '/storage/' . $path;
        }

        return $this->repository->create($data);
    }

    public function updateTechnology(Technology $technology, array $data)
    {
        if (isset($data['icon'])) {
            if ($technology->icon_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $technology->icon_url));
            }
            $path = $data['icon']->store('icons', 'public');
            $data['icon_url'] = '/storage/' . $path;
        }

        return $this->repository->update($technology, $data);
    }

    public function deleteTechnology(Technology $technology)
    {
        if ($technology->icon_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $technology->icon_url));
        }

        return $this->repository->delete($technology);
    }
}
