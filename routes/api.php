<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TicketController;


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


Route::group(['prefix'=>'v1', 'as' => 'api.'], function(){
    // its best
//    Route::apiResource('tickets', TicketController::class);

    // do it as requirement
    Route::post('ticket/add', [TicketController::class, 'store'])->name('ticket.create');
    Route::put('ticket/edit/{id}', [TicketController::class, 'update'])->name('ticket.update');
    Route::get('ticket/list', [TicketController::class, 'index'])->name('ticket.list');

});
