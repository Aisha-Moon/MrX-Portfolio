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

    // Create or Update resume details
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'downloadLink' => 'required|url|max:255',
        ]);

        $resume = Resume::first();

        if ($resume) {
            $resume->update([
                'downloadLink' => $request->downloadLink,
            ]);
            return $this->sendResponse($resume, 'Resume link updated successfully.');
        } else {
            $newResume = Resume::create([
                'downloadLink' => $request->downloadLink,
            ]);
            return $this->sendResponse($newResume, 'Resume link created successfully.');
        }
    }
}
