<?php

namespace App\Http\Controllers\admin\api;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class ResumeController extends BaseController
{
    // Fetch all resume details
    public function index()
    {
        $resume = Resume::first(); 
        return response()->json(['data' => $resume], 200);
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'resumeFile' => 'required|mimes:pdf|max:2048',
        ]);
    
        $filePath = $request->file('resumeFile')->store('resumes', 'public');
    
        $resume = Resume::first();
    
        if ($resume) {
            $resume->update(['downloadLink' => asset('storage/' . $filePath)]);
            return response()->json(['message' => 'Resume link updated successfully.'], 200);
        } else {
            $newResume = Resume::create(['downloadLink' => asset('storage/' . $filePath)]);
            return response()->json(['message' => 'Resume link created successfully.'], 201);
        }
    }
    
}    
