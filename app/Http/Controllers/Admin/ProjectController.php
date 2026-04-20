<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Services\ProjectService;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $service
    ) {}

    public function index()
    {
        return Inertia::render('Admin/Projects/Index', [
            'projects' => $this->service->getAllProjects()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Projects/Form', [
            'technologies' => Technology::all(),
            'project' => new Project()
        ]);
    }

    public function store(ProjectRequest $request)
    {
        $this->service->createProject($request->validated());

        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $project->load('technologies');
        
        return Inertia::render('Admin/Projects/Form', [
            'project' => $project,
            'technologies' => Technology::all()
        ]);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->service->updateProject($project, $request->validated());

        return redirect()->route('admin.projects.index')->with('message', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $this->service->deleteProject($project);
        
        return redirect()->route('admin.projects.index')->with('message', 'Project deleted successfully.');
    }
}
