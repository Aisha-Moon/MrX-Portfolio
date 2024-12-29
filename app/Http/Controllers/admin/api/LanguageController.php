<?php

namespace App\Http\Controllers\admin\api;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class LanguageController extends BaseController
{
    /**
     * Display a listing of the languages.
     */
    public function index()
    {
        $languages = Language::all();
        return response()->json($languages);
    }

    /**
     * Store a newly created language in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $language = Language::create([
            'name' => $validated['name'],
        ]);

        return response()->json(['message' => 'Language created successfully', 'data' => $language], 201);
    }

    /**
     * Show the specified language.
     */
    public function show(Language $language)
    {
        return response()->json($language);
    }

    /**
     * Update the specified language in storage.
     */
    public function update(Request $request, Language $language)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $language->update([
            'name' => $validated['name'],
        ]);

        return response()->json(['message' => 'Language updated successfully', 'data' => $language]);
    }

    /**
     * Remove the specified language from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return response()->json(['message' => 'language deleted successfully']);
    }
}
