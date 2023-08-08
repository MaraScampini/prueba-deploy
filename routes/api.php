<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//CONTROLLERS
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//SERVER ACTIVE
Route::get('/', function () {
    return 'Welcome to the beginning of nothingness';
});


// AUTH CONTROLLER
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

//USER CONTROLLER
Route::get('/user/profile', [UserController::class, 'getUserProfile'])->middleware(['auth:sanctum']);
Route::put('/user/profile/updateProfile', [UserController::class, 'updateProfile'])->middleware(['auth:sanctum']);
Route::get('/user/allUsers', [UserController::class, 'getAllUsers'])->middleware(['auth:sanctum', 'isAdmin']);
// Route::delete('/user/deleteUser', [UserController::class, 'deleteUser'])->middleware(['auth:sanctum', 'isAdmin']);

// TEAMS CONTROLLER
Route::get('/user/teams', [TeamController::class, 'getUserTeams'])->middleware(['auth:sanctum']);
Route::get('/team/allTeams', [TeamController::class, 'getAllTeams'])->middleware(['auth:sanctum']);
Route::post('/team/newTeam', [TeamController::class, 'createTeam'])->middleware(['auth:sanctum', 'isAdmin']);
Route::put('/team/updateTeam', [TeamController::class, 'updateTeam'])->middleware(['auth:sanctum', 'isAdmin']);
// Route::delete('/team/deleteTeam', [TeamController::class, 'deleteTeam'])->middleware(['auth:sanctum', 'isAdmin']);

//PROJECT CONTROLLER
Route::get('/user/projects', [ProjectController::class, 'getUserProjects'])->middleware(['auth:sanctum']);
Route::get('/project/allProjects', [ProjectController::class, 'getAllProjects'])->middleware(['auth:sanctum']);
Route::post('/project/newProject', [ProjectController::class, 'createProject'])->middleware(['auth:sanctum','isAdmin']);
Route::put('/project/updateProject', [ProjectController::class, 'updateProject'])->middleware(['auth:sanctum','isAdmin']);
Route::delete('/project/deleteProject', [ProjectController::class, 'deleteProject'])->middleware(['auth:sanctum','isAdmin']);

//INVENTORY CONTROLLER


//PRODUCT CONTROLLER


//PROVIDER CONTROLLER