<?php

namespace App\Http\Controllers;

use App\Models\LessonClass;
use Illuminate\Http\Request;

class LessonClassController extends Controller
{
    // Display a list of lesson classes
    public function index(Request $request)
    {
        $query = $request->input('query');

        $lessonClasses = LessonClass::when($query, function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(5);

        return response()->json($lessonClasses);
    }

    // Store a new lesson class
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string', // Assuming this is a URL or path to the image
        ]);

        $lessonClass = LessonClass::create($validated);
        return response()->json($lessonClass, 201);
    }

    // Display a specific lesson class
    public function show($id)
    {
        $lessonClass = LessonClass::findOrFail($id);
        return response()->json($lessonClass);
    }

    // Update a specific lesson class
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $lessonClass = LessonClass::findOrFail($id);
        $lessonClass->update($validated);

        return response()->json($lessonClass);
    }

    // Delete a specific lesson class
    public function destroy($id)
    {
        $lessonClass = LessonClass::findOrFail($id);
        $lessonClass->delete();

        return response()->json(['message' => 'Lesson class deleted successfully'], 204);
    }
}
