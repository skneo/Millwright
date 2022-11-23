<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MwController;
use App\Http\Controllers\FaultController;

Route::get('/', function () {
    $board = file_get_contents('noticeboard.txt');
    $data = compact('board');
    return view('home')->with($data);
});
Route::get('/edit-board', [MwController::class, 'editBoard']);
Route::post('/update-board', [MwController::class, 'update']);
//employee routes
Route::get('/add-employee', [EmployeeController::class, 'show_form']);
Route::post('/add-employee', [EmployeeController::class, 'add_employee']);
Route::get('/employees', [EmployeeController::class, 'all_employees']);
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete']);
//machines routes
Route::get('/machines', [MachineController::class, 'all_machines']);
Route::get('/add-machine', [MachineController::class, 'show_form']);
Route::post('/add-machine', [MachineController::class, 'add_machine']);
Route::get('/edit-machine/{id}', [MachineController::class, 'edit']);
Route::post('/update-machine/{id}', [MachineController::class, 'update']);
Route::get('/asset-introduction/{assetName}/{id}', [MachineController::class, 'introduction']);
Route::get('/edit-introduction/{assetName}/{id}', [MachineController::class, 'editIntro']);
Route::post('/update-introduction/{id}', [MachineController::class, 'updateIntro']);
//article routes
Route::get('/new-article/{category}', [ArticleController::class, 'newArticle']);
Route::post('/save-article', [ArticleController::class, 'saveArticle']);
Route::get('/all-articles', [ArticleController::class, 'allArticles']);
Route::get('/article/{title}/{id}', [ArticleController::class, 'showArticle']);
Route::get('/edit-article/{title}/{id}', [ArticleController::class, 'edit']);
Route::post('/update-article/{id}', [ArticleController::class, 'update']);
Route::get('/articles/', [ArticleController::class, 'search']);
//faults routes
Route::get('/faults/{machine}', [FaultController::class, 'all_faults']);
