<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){ return 'Medieval Colony Sim'; });

// Map generation admin routes added by assistant
use App\Http\Controllers\Admin\MapGenController;

Route::middleware(['auth'])->prefix('admin/mapgen')->group(function () {
    Route::get('/', [MapGenController::class,'index'])->name('admin.mapgen.index');
    Route::post('/place-settlements', [MapGenController::class,'placeSettlements'])->name('admin.mapgen.placeSettlements');
    Route::get('/editor', function(){ return view('admin.mapgen.editor'); })->name('admin.mapgen.editor');
});
