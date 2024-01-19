<?php

use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamMembersController;
use App\Http\Controllers\MemberProjectsController;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/profile/{id}/projects', [MemberProjectsController::class, 'store'])->name('profile.projects.store');
//  API Endpoint to: Get the members of a specific team
    Route::get('/teams/{id}/members', [TeamMembersController::class, 'show'])->name('teams.members.show');
// - API Endpoint to: Add a member to a project
    Route::post('/teams/{id}/members', [TeamMembersController::class, 'store'])->name('teams.members.store');
// - API Endpoint to: Get the members of a specific project
    Route::get('/projects/{id}/members', [MemberProjectsController::class, 'show'])->name('projects.members.show');
    Route::post('/projects/{id}/members', [MemberProjectsController::class, 'store'])->name('projects.members.store');
});
Route::resource('teams', TeamController::class)
    ->middleware(['auth', 'verified']);

Route::resource('projects', ProjectController::class)
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
