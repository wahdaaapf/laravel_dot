<?php

use App\Http\Controllers\API\MajorController;
use App\Http\Livewire\Admin\AdminAddMajorComponent;
use App\Http\Livewire\Admin\AdminMajorsComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('major', [AdminMajorsComponent::class,'render']);

Route::post('addMajor', [AdminAddMajorComponent::class,'storeMajor']);