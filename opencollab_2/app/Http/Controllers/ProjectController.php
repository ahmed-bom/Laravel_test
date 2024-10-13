<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        foreach ($projects as $project) {
            $project->files = Storage::files($project->path);
        }
        return view('user', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'files' => 'required',
            'files.*' => 'file',
        ]);

        $project = new Project();
        $project->project_name = $request->project_name;
        $project->description = $request->description;
        $project->user_id = Auth::id();
        $project->path = 'projects/' . uniqid();
        $project->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->getPathname();
                $relativePath = $this->getRelativePath($file);
                $fileName = $file->getClientOriginalName();
                Storage::putFileAs($project->path . '/' . $relativePath, $filePath, $fileName);
            }
        }

        return redirect()->route('user')->with('success', 'Project created successfully.');
    }

    private function getRelativePath($file)
    {
        $path = $file->getClientOriginalName();
        $parts = explode(DIRECTORY_SEPARATOR, $path);
        array_pop($parts);
        return implode(DIRECTORY_SEPARATOR, $parts);
    }


    /**
     * Helper function to get the relative path from the original file path
     */




    public function downloadFile($projectId, $fileName)
    {
        $path = storage_path('app/public/projects/' . $projectId . '/' . $fileName);

        if (file_exists($path)) {
            return response()->download($path);
        }

        return redirect()->back()->with('error', 'File not found.');
    }

    public function deleteFile($projectId, $fileName)
    {
        $path = storage_path('app/public/projects/' . $projectId . '/' . $fileName);

        if (file_exists($path)) {
            unlink($path); // Delete the file
            return redirect()->back()->with('success', 'File deleted successfully.');
        }

        return redirect()->back()->with('error', 'File not found.');
    }
}
