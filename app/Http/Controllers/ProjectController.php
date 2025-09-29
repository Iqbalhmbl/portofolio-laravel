<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('files')->get();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('admin.project.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'year' => 'required|integer',
        'description' => 'nullable|string',
        'tech_stack' => 'required|array',
        'tech_stack.*' => 'exists:skills,id',
        'files' => 'nullable|array',
        'files.*' => 'file|mimes:jpg,jpeg,png,gif,mp4,webm,ogg|max:51200',
    ]);

    $validated['tech_stack'] = json_encode($validated['tech_stack']);

    $project = Project::create($validated);

    if ($request->hasFile('files')) {
        $destination = public_path('files/projects');
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        foreach ($request->file('files') as $file) {
            if (!$file->isValid()) continue;
            $original = $file->getClientOriginalName();
            $filename = time() . '_' . uniqid() . '_' . preg_replace('/\s+/', '_', $original);
            $file->move($destination, $filename);

            $storedPath = 'files/projects/' . $filename;

            ProjectFile::create([
                'project_id' => $project->id,
                'file_path' => $storedPath,
                'file_type' => $file->getClientMimeType(),
            ]);
        }
    }

    return redirect()->route('projects.index')->with('success', 'Project created successfully.');
}

/**
 * Display the specified resource.
 */
public function show(Project $project)
{
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $skills = Skill::all();
        return view('admin.project.edit', compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */

 
public function update(Request $request, Project $project)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'year' => 'required|integer',
        'description' => 'nullable|string',
        'tech_stack' => 'required|array',
        'tech_stack.*' => 'exists:skills,id',
        'files' => 'nullable|array',
        'files.*' => 'file|mimes:jpg,jpeg,png,gif,mp4,webm,ogg|max:51200',
    ]);

    $validated['tech_stack'] = json_encode($validated['tech_stack']);

    $project->update($validated);

    if ($request->hasFile('files')) {
        $destination = public_path('files/projects');
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        foreach ($request->file('files') as $file) {
            if (!$file->isValid()) continue;
            $original = $file->getClientOriginalName();
            $filename = time() . '_' . uniqid() . '_' . preg_replace('/\s+/', '_', $original);
            $file->move($destination, $filename);

            $storedPath = 'files/projects/' . $filename;

            ProjectFile::create([
                'project_id' => $project->id,
                'file_path' => $storedPath,
                'file_type' => $file->getClientMimeType(),
            ]);
        }
    }

    return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
}
/**
 * Remove the specified resource from storage.
 */
public function destroy(Project $project)
{
        // Delete associated files from storage
        foreach ($project->files as $file) {
            \Storage::disk('public')->delete($file->file_path);
        }

        // Delete associated file records
        $project->files()->delete();

        // Delete the project
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    /**
     * Remove the specified file from storage.
     */
    public function deleteFile(Project $project, $fileId)
    {
        $file = $project->files()->findOrFail($fileId);

        // Delete the file from storage
        \Storage::disk('public')->delete($file->file_path);

        // Delete the file record from the database
        $file->delete();

        return redirect()->route('projects.show', $project)->with('success', 'File deleted successfully.');
    }
}
