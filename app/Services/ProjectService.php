<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Storage;

class ProjectService
{
    public function __construct(
        protected ProjectRepository $repository
    ) {}

    public function getAllProjects()
    {
        return $this->repository->getAllWithTechnologies();
    }

    public function createProject(array $data)
    {
        if (isset($data['thumbnail'])) {
            $path = $data['thumbnail']->store('thumbnails', 'public');
            $data['thumbnail_url'] = '/storage/' . $path;
        }

        $project = $this->repository->create($data);

        if (isset($data['technologies'])) {
            $this->repository->syncTechnologies($project, $data['technologies']);
        }

        return $project;
    }

    public function updateProject(Project $project, array $data)
    {
        if (isset($data['thumbnail'])) {
            if ($project->thumbnail_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $project->thumbnail_url));
            }
            $path = $data['thumbnail']->store('thumbnails', 'public');
            $data['thumbnail_url'] = '/storage/' . $path;
        }

        $this->repository->update($project, $data);

        if (isset($data['technologies'])) {
            $this->repository->syncTechnologies($project, $data['technologies']);
        } else {
            $this->repository->detachTechnologies($project);
        }

        return $project;
    }

    public function deleteProject(Project $project)
    {
        if ($project->thumbnail_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $project->thumbnail_url));
        }

        return $this->repository->delete($project);
    }
}
