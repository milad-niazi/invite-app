<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CeremonyController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
Route::middleware('auth')->prefix('ceremony')->group(function () {
    Route::get('/', [CeremonyController::class, 'index'])->name('ceremony.index');
    Route::get('/create', [CeremonyController::class, 'create'])->name('ceremony.create');
    Route::post('/', [CeremonyController::class, 'store'])->name('ceremony.store');
    Route::get('/{ceremony}/edit', [CeremonyController::class, 'edit'])->name('ceremony.edit');
    Route::patch('/{ceremony}', [CeremonyController::class, 'update'])->name('ceremony.update');
    Route::delete('/{ceremony}', [CeremonyController::class, 'destroy'])->name('ceremony.destroy');
});

Route::get('/invite/{link_address}', [InvitationController::class, 'show'])->name('invitation.show');


require __DIR__ . '/auth.php';
