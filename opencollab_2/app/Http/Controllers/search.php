<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class search extends Controller
{
    public function search($query)
{
    
    if (str_starts_with($query, '/')) {
        $type = 'user';
        $search_term = substr($query, 1);
        $results = User::where('name', 'like', '%' . $search_term . '%')->get();
    } elseif (str_starts_with($query, '&')) {
        $type = 'project';
        $search_term = substr($query, 1);
        $results = Project::where('name', 'like', '%' . $search_term . '%')->get();
    } else {
        return 'error';
    }
    // return $results;
    return redirect('/dashboard/' . $results);

}
}
