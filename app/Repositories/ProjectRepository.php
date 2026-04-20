<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function getAllWithTechnologies(): Collection
    {
        return Project::with('technologies')->latest()->get();
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): bool
    {
        return $project->update($data);
    }

    public function delete(Project $project): ?bool
    {
        return $project->delete();
    }

    public function syncTechnologies(Project $project, array $technologyIds): array
    {
        return $project->technologies()->sync($technologyIds);
    }

    public function detachTechnologies(Project $project): void
    {
        $project->technologies()->detach();
    }
}
