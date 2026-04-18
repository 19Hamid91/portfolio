<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies')->latest()->get();
        return Inertia::render('Admin/Projects/Index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $technologies = Technology::all();
        return Inertia::render('Admin/Projects/Form', [
            'technologies' => $technologies,
            'project' => new Project()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'web_link' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'thumbnail_url' => 'nullable|string',
            'technologies' => 'array'
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail_url'] = '/storage/' . $path;
        }

        $project = Project::create($validated);
        
        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $project->load('technologies');
        $technologies = Technology::all();
        
        return Inertia::render('Admin/Projects/Form', [
            'project' => $project,
            'technologies' => $technologies
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'web_link' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'thumbnail_url' => 'nullable|string',
            'technologies' => 'array'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $project->thumbnail_url));
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail_url'] = '/storage/' . $path;
        }

        $project->update($validated);
        
        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.index')->with('message', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $project->thumbnail_url));
        }
        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('message', 'Project deleted successfully.');
    }
}
