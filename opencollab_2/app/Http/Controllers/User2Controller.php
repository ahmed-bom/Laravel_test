<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class User2Controller extends Controller
{
    public function index($user_id){
    $user = User::find($user_id);
    $projects = Project::where('user_id', $user_id)->get();
    $files = [];
        foreach ($projects as $project) {
            $files = $this->getDirectoryContents($project->path);
        }
    return view('user2', compact('projects','user','files'));
    return view('user2',['user'=>$user,'projects'=>$projects,'files'=>$files]);
    }


    private function getDirectoryContents($path)
    {
        $contents = [];
        $files = Storage::allFiles($path);

        foreach ($files as $file) {
            $relativePath = str_replace($path . '/', '', $file);
            $pathInfo = pathinfo($relativePath);
            $contents[] = [
                'name' => $pathInfo['basename'],
                'path' => $relativePath,
                'directory' => dirname($relativePath) !== '.' ? dirname($relativePath) : '',
                'full_path' => $file
            ];
        }

        return $contents;
    }
}
