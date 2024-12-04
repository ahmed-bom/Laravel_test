<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class search extends Controller
{
    public function main_search(Request $request)
{
    $query = $request->input('search-bar');
 if (str_starts_with($query, '/')) {
        $type = 'user';
        $search_term = substr($query, 1);
        $results = User::where('name', 'like', '%' . $search_term . '%')->get();
    } elseif (str_starts_with($query, '&')) {
        $type = 'project';
        $search_term = substr($query, 1);
        $results = Project::where('name', 'like', '%' . $search_term . '%')->get();
    } else {
        return redirect()->route('dashboard');
    }
    return view('search',['results' => $results, 'type' => $type]);

}
}

// App\Http\Controllers\DB
//  DB::table('projects')
// ->select('projects.project_name','projects.description','users.name','users.email')
// ->join('users','projects.user_id','=','users.id')
// ->where('name', 'like', '%' . $search_term . '%')->get();
