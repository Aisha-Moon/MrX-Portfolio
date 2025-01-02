<?php

namespace App\Http\Controllers\admin\api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Resources\ProjectResource;

class ProjectController extends BaseController
{
    public function index()
    {
        $projects = Project::all();
        return ProjectResource::collection($projects);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'previewLink' => 'required|url|max:100',
            'thumbnailLink' => 'required|url|max:100',
            'details' => 'required|string',
        ]);

        $project = Project::create($validated);

        return $this->sendResponse(new ProjectResource($project), 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return $this->sendResponse(new ProjectResource($project), 'Project details fetched successfully.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'previewLink' => 'required|url|max:100',
            'thumbnailLink' => 'required|url|max:100',
            'details' => 'required|string',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validated);

        return $this->sendResponse(new ProjectResource($project), 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully.'], 200);
    }
}
