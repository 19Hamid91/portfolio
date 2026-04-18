<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Technology;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $projects = Project::with('technologies')->latest()->get();
        $technologies = Technology::all();

        return Inertia::render('Public/Home', [
            'profile' => $profile,
            'projects' => $projects,
            'technologies' => $technologies
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
