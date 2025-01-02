<?php

namespace App\Http\Controllers\admin\api;

use Illuminate\Http\Request;
use App\Models\HeroProperties;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Resources\HeroPropertyResource;

class HeroController extends BaseController
{
    public function index()
    {
        $heroes = HeroProperties::all();
        return HeroPropertyResource::collection($heroes);
    }

    public function storeOrUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'keyLine' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        // Get the first Hero record (if exists)
        $hero = HeroProperties::first();
        $imagePath = $hero ? $hero->image : null;
    
        // Handle image upload and delete the old image
        if ($request->hasFile('image')) {
            if ($imagePath) {
                // Convert the path to the public storage path
                $fullPath = 'public/' . $imagePath;
    
                // Delete the old image if it exists
                if (\Storage::exists($fullPath)) {
                    \Storage::delete($fullPath);
                }
            }
    
            // Store the new image in the 'uploads/hero' directory
            $imagePath = $request->file('image')->store('uploads/hero', 'public');
        }

    
        // Update or create the Hero record
        if ($hero) {
            $hero->update([
                'keyLine' => $request->keyLine,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'image' => $imagePath,
            ]);
    
            return $this->sendResponse($hero, 'Hero section updated successfully.');
        } else {
            $newHero = HeroProperties::create([
                'keyLine' => $request->keyLine,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'image' => $imagePath,
            ]);
    
            return $this->sendResponse($newHero, 'Hero section created successfully.');
        }
    }
    
    
    
}
