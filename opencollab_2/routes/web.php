<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
