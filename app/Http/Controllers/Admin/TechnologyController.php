<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return Inertia::render('Admin/Technologies/Index', [
            'technologies' => $technologies
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'icon_url' => 'nullable|string'
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $validated['icon_url'] = '/storage/' . $path;
        }

        Technology::create($validated);
        return redirect()->back()->with('message', 'Technology added successfully.');
    }

    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:1024'
        ]);

        if ($request->hasFile('icon')) {
            if ($technology->icon_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $technology->icon_url));
            }
            $path = $request->file('icon')->store('icons', 'public');
            $validated['icon_url'] = '/storage/' . $path;
        }

        $technology->update($validated);
        return redirect()->back()->with('message', 'Technology updated successfully.');
    }

    public function destroy(Technology $technology)
    {
        if ($technology->icon_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $technology->icon_url));
        }
        $technology->delete();
        return redirect()->back()->with('message', 'Technology deleted successfully.');
    }
}
