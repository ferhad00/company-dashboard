<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TaskController;
Route::get('/',[UserController::class,('show_login')]);
Route::get('/signup',[UserController::class,('show_signup')]);
Route::post('/signupAccess',[UserController::class,('signup')]);
Route::post('/login',[UserController::class,('login')]);
Route::post('/logout',[UserController::class,('logout')]);
Route::middleware('user.check')->group(function () {

    //user
    Route::get('/admin',[Usercontroller::class,'show_admin']);
    Route::get('/user',[UserController::class,'show_user' ]);
    Route::delete('/delete/{id}',[UserController::class,'destroy' ])->name('user.destroy');
    Route::get('/edit/{id}',[UserController::class, 'edit']);
    Route::put('/editUser/submit/{id}',[UserController::class, 'update'])->name('user.update');
    //team
    Route::get('/addTeam',[TeamController::class, 'index']);
    Route::post('addteam/submet', [TeamController::class , 'store'])->name('teams.store');
    Route::get('/team/{id}',[TeamController::class,'show']);
    Route::get('/team/edit/{id}',[TeamController::class, 'edit']);
    Route::put('/team/edit/submet/{id}',[TeamController::class, 'update'])->name('team.update');
    Route::delete('team/delete/{id}',[TeamController::class,'destroy'])->name('team.destroy');
    //task

    Route::get('/addTask/{id}', [TaskController::class,'create'])->name('task.create');
    Route::post('/addTask/submit/{id}',[TaskController::class, 'store'])->name('task.store');
    Route::get('/editTask/{id}',[TaskController::class, 'edit'])->name('task.edit');
    Route::put('/editTask/submit/{id}',[TaskController::class, 'update'])->name('task.update');
    Route::delete('deleteTask/{id}',[TaskController::class, 'destroy'])->name('task.destroy');
    Route::put('completeTask/{id}',[TaskController::class, 'complete'])->name('task.complete')->middleware('task');
    Route::get('user/tasks/{id}',[TaskController::class, 'show']);

});
