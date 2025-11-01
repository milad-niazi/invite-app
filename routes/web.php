<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('invitation')->group(function () {
    Route::get('/', [InvitationController::class, 'index'])->name('invitation.index');
    Route::get('/create', [InvitationController::class, 'create'])->name('invitation.create');
    Route::post('/', [InvitationController::class, 'store'])->name('invitation.store');
    Route::get('/{invitation}/edit', [InvitationController::class, 'edit'])->name('invitation.edit');
    Route::patch('/{invitation}', [InvitationController::class, 'update'])->name('invitation.update');
    Route::delete('/{invitation}', [InvitationController::class, 'destroy'])->name('invitation.destroy');
});

Route::get('/invite/{link_address}', [InvitationController::class, 'show'])->name('invitation.show');


require __DIR__ . '/auth.php';
