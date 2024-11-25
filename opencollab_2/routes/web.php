<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/search',function (Request $request) {
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
    return view('dashboard',['results' => $results, 'type' => $type]);
})->name('search');

Route::get('/user', function () {
    return view('user');
})->middleware(['auth', 'verified'])->name('user');


Route::get('/favorite', function () {
    return view('favorite',['projects' => ['laravel_1','project c','test js','opencollab']]);
})->middleware(['auth', 'verified'])->name('favorite');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('user');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}/download/{file}', [ProjectController::class, 'downloadFile'])->name('projects.download');
Route::delete('/projects/{project}/delete-file/{file}', [ProjectController::class, 'deleteFile'])->name('projects.deleteFile');


require __DIR__.'/auth.php';
