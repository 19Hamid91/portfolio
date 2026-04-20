<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProfileService;
use App\Services\ProjectService;
use App\Services\TechnologyService;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __construct(
        protected ProfileService $profileService,
        protected ProjectService $projectService,
        protected TechnologyService $technologyService
    ) {}

    public function index()
    {
        return Inertia::render('Public/Home', [
            'profile' => $this->profileService->getProfile(),
            'projects' => $this->projectService->getAllProjects(),
            'technologies' => $this->technologyService->getAllTechnologies()
        ]);
    }

    public function show(Project $project)
    {
        $project->load('technologies');
        
        return Inertia::render('Public/ProjectDetail', [
            'project' => $project
        ]);
    }
}
