<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierDashboardController;
use App\Http\Controllers\Supplier\PublicationController;

// Landing Page
Route::get('/', [HomeController::class, 'index']);


// Invitados
Route::middleware('guest')->group(function () {

    Route::get('/registro', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/registro', [AuthController::class, 'register']);

    Route::get('/iniciar-sesion', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/iniciar-sesion', [AuthController::class, 'login']);
});


// Dashboard Proveedor
Route::middleware(['auth', 'role:supplier'])
    ->prefix('dashboard/proveedor')
    ->group(function () {

        // Dashboard
        Route::get(
            '/',
            [SupplierDashboardController::class, 'index']
        )->name('supplier.dashboard');

        // Publicaciones
        Route::get(
            '/publicaciones',
            [PublicationController::class, 'index']
        )->name('supplier.publications.index');

        Route::get(
            '/publicaciones/crear',
            [PublicationController::class, 'create']
        )->name('supplier.publications.create');

        Route::post(
            '/publicaciones',
            [PublicationController::class, 'store']
        )->name('supplier.publications.store');

        Route::get(
            '/publicaciones/{publication}',
            [PublicationController::class, 'show']
        )->name('supplier.publications.show');

        Route::get(
            '/publicaciones/{publication}/editar',
            [PublicationController::class, 'edit']
        )->name('supplier.publications.edit');

        Route::put(
            '/publicaciones/{publication}',
            [PublicationController::class, 'update']
        )->name('supplier.publications.update');

        Route::delete(
            '/publicaciones/{publication}',
            [PublicationController::class, 'destroy']
        )->name('supplier.publications.destroy');


        // Imágenes de publicaciones
        Route::delete(
            '/publicaciones/imagenes/{image}',
            [PublicationController::class, 'destroyImage']
        )->name('supplier.publications.images.destroy');
    });


// Dashboard Emprendedor
Route::get('/dashboard/emprendedor', function () {
    return view('dashboard.entrepreneur.index');
})
->middleware(['auth', 'role:entrepreneur'])
->name('entrepreneur.dashboard');


// Logout
Route::post('/cerrar-sesion', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');