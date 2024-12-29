<?php

namespace App\Http\Controllers\admin\api;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Resources\EducationResource;

class EducationController extends BaseController
{
    public function index()
    {
        $educations = Education::all();
        return EducationResource::collection($educations);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'duration' => 'required|string|max:50',
            'instituteName' => 'required|string|max:50',
            'field' => 'required|string|max:50',
            'details' => 'required|string',
        ]);

        $education = Education::create($validated);

        return $this->sendResponse(new EducationResource($education), 'Education created successfully.');
    }

    public function show(Education $education)
    {
        return $this->sendResponse(new EducationResource($education), 'Education details fetched successfully.');
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'duration' => 'required|string|max:50',
            'instituteName' => 'required|string|max:50',
            'field' => 'required|string|max:50',
            'details' => 'required|string',
        ]);

        $education->update($validated);

        return $this->sendResponse(new EducationResource($education), 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return response()->json(['message' => 'Education deleted successfully.'], 200);
    }
}
