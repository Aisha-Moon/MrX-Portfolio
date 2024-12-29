<?php

namespace App\Http\Controllers\admin\api;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Resources\ExperienceResource;

class ExperienceController extends BaseController
{
    public function index()
    {
        $experiences = Experience::all();
        return ExperienceResource::collection($experiences);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'duration' => 'required|string|max:50',
            'title' => 'required|string|max:50',
            'designation' => 'required|string|max:50',
            'details' => 'required|string',
        ]);

        $experience = Experience::create($validated);

        return $this->sendResponse(new ExperienceResource($experience), 'Experience created successfully.');

    }
   // Example of using resource with sendResponse
   public function show(Experience $experience)
   {
    //    dd($experience);
       return $this->sendResponse(new ExperienceResource($experience), 'Experience details fetched successfully.');
   }
   

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'duration' => 'required|string|max:50',
            'title' => 'required|string|max:50',
            'designation' => 'required|string|max:50',
            'details' => 'required|string',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update($validated);

        return $this->sendResponse(new ExperienceResource($experience), 'Experience updated successfully.');

    }

   

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return response()->json(['message' => 'Experience deleted successfully.'], 200);
    }
}
