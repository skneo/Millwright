<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MwController;
use App\Http\Controllers\FaultController;
use App\Http\Controllers\SpareController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuth;

Route::get('/', function () {
    $board = file_get_contents('noticeboard.txt');
    $data = compact('board');
    return view('home')->with($data);
});
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/edit-board', [MwController::class, 'editBoard']);
    Route::post('/update-board', [MwController::class, 'update']);
});
//employee routes
Route::get('/employees', [EmployeeController::class, 'all']);
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/add-employee', [EmployeeController::class, 'new']);
    Route::post('/save-employee', [EmployeeController::class, 'save']);
    Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
    Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);
    Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete']);
});
//machines routes
Route::get('/machines', [MachineController::class, 'all']);
Route::get('/machine-introduction/{machineName}/{id}', [MachineController::class, 'introduction']);
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/add-machine', [MachineController::class, 'new']);
    Route::post('/save-machine', [MachineController::class, 'save']);
    Route::get('/edit-machine/{id}', [MachineController::class, 'edit']);
    Route::post('/update-machine/{id}', [MachineController::class, 'update']);
    Route::get('/edit-introduction/{machineName}/{id}', [MachineController::class, 'editIntro']);
    Route::post('/update-introduction/{id}', [MachineController::class, 'updateIntro']);
});
//article routes
Route::get('/all-articles/{category?}', [ArticleController::class, 'all']);
Route::get('/article/{title}/{id}', [ArticleController::class, 'showArticle']);
Route::get('/articles/', [ArticleController::class, 'search']);
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/new-article/{category}', [ArticleController::class, 'new']);
    Route::post('/save-article', [ArticleController::class, 'save']);
    Route::get('/edit-article/{title}/{id}', [ArticleController::class, 'edit']);
    Route::post('/update-article/{id}', [ArticleController::class, 'update']);
});
//faults routes
Route::get('/faults', [FaultController::class, 'machineFaults']); //machine name is passed through get method
Route::get('/all-faults', [FaultController::class, 'allFaults']);
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/new-fault/{machine}', [FaultController::class, 'new']);
    Route::post('/save-fault/{machine}', [FaultController::class, 'save']);
    Route::get('/edit-fault/{machine}/{id}', [FaultController::class, 'edit']);
    Route::post('/update-fault/{id}', [FaultController::class, 'update']);
});
//spares routes
Route::get('/spares/{category}', [SpareController::class, 'spares']);
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/add-spare', [SpareController::class, 'new']);
    Route::post('/save-spare', [SpareController::class, 'save']);
    Route::get('/edit-spare/{id}', [SpareController::class, 'edit']);
    Route::post('/update-spare/{id}', [SpareController::class, 'update']);
    Route::get('/delete-spare/{id}', [SpareController::class, 'delete']);
});
//user routes
Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login']);
Route::view('/forgot-password', 'forgotPassword');
Route::post('/request-otp', [UserController::class, 'requestOTP']);
Route::view('/reset-password', 'resetPassword');
Route::post('/reset-password', [UserController::class, 'resetPassword']);
Route::middleware([UserAuth::class])->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::view('/change-password', 'changePassword');
    Route::post('/update-password', [UserController::class, 'updatePassword']);
});
