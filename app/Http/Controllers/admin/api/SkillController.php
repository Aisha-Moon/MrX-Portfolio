<?php

namespace App\Http\Controllers\admin\api;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SkillController extends BaseController
{
    /**
     * Display a listing of the skills.
     */
    public function index()
    {
        $skills = Skill::all();
        return response()->json($skills);
    }

    /**
     * Store a newly created skill in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill = Skill::create([
            'name' => $validated['name'],
        ]);

        return response()->json(['message' => 'Skill created successfully', 'data' => $skill], 201);
    }

    /**
     * Show the specified skill.
     */
    public function show(Skill $skill)
    {
        return response()->json($skill);
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill->update([
            'name' => $validated['name'],
        ]);

        return response()->json(['message' => 'Skill updated successfully', 'data' => $skill]);
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return response()->json(['message' => 'Skill deleted successfully']);
    }
}
