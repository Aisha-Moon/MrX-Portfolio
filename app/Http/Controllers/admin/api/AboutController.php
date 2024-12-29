<?php

namespace App\Http\Controllers\admin\api;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Resources\AboutResource;
use App\Http\Controllers\BaseController;

class AboutController extends BaseController
{
    public function index()
    {
        $abouts = About::all();
        return AboutResource::collection($abouts);
    }
    

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $about = About::first();

        if ($about) {
            $about->update($request->all());
            return $this->sendResponse($about, 'About section updated successfully.');

        } else {
            $newAbout = About::create($request->all());
            return $this->sendResponse($newAbout, 'About section created successfully.');

        }
    }
}
