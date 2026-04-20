<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechnologyRequest;
use App\Models\Technology;
use App\Services\TechnologyService;
use Inertia\Inertia;

class TechnologyController extends Controller
{
    public function __construct(
        protected TechnologyService $service
    ) {}

    public function index()
    {
        return Inertia::render('Admin/Technologies/Index', [
            'technologies' => $this->service->getAllTechnologies()
        ]);
    }

    public function store(TechnologyRequest $request)
    {
        $this->service->createTechnology($request->validated());
        return redirect()->back()->with('message', 'Technology added successfully.');
    }

    public function update(TechnologyRequest $request, Technology $technology)
    {
        $this->service->updateTechnology($technology, $request->validated());
        return redirect()->back()->with('message', 'Technology updated successfully.');
    }

    public function destroy(Technology $technology)
    {
        $this->service->deleteTechnology($technology);
        return redirect()->back()->with('message', 'Technology deleted successfully.');
    }
}
