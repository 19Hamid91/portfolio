<?php

namespace App\Repositories;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Collection;

class TechnologyRepository
{
    public function getAll(): Collection
    {
        return Technology::all();
    }

    public function create(array $data): Technology
    {
        return Technology::create($data);
    }

    public function update(Technology $technology, array $data): bool
    {
        return $technology->update($data);
    }

    public function delete(Technology $technology): ?bool
    {
        return $technology->delete();
    }
}
