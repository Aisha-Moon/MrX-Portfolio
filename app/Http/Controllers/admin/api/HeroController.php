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
        $request->validate([
            'keyLine' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $hero = HeroProperties::first();
    
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('uploads/hero', 'public');
        }
    
        if ($hero) {
            $hero->update([
                'keyLine' => $request->keyLine,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'image' => $imagePath ?? $hero->image, 
            ]);
            return $this->sendResponse($hero, 'Hero section updated successfully.');
        } else {
            // Create new data
            $newHero = HeroProperties::create([
                'keyLine' => $request->keyLine,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'image' => $imagePath ?? null, // Set image path or leave null
            ]);
            return $this->sendResponse($newHero, 'Hero section created successfully.');
        }
    }
    
}
