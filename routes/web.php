<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CompanyProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', function () {
    return view('home');
});



Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');



Route::middleware(['auth'])->group(function () {
    Route::get('company-profile/create', [CompanyProfileController::class, 'create'])->name('company-profile.create');
    Route::post('company-profile', [CompanyProfileController::class, 'store'])->name('company-profile.store');
   // Route::get('company-profile/{companyProfile}/edit', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('company-profile/{companyProfile}', [CompanyProfileController::class, 'update'])->name('company-profile.update');
    Route::get('company-profile', [CompanyProfileController::class, 'index'])->name('company-profile.index');

    // Ruta para la lista genérica de usuarios
    Route::get('/users', function () {
        return view('user_profiles.index'); // Vista que incluye <livewire:user-profile-list />
    })->name('users.index');

    // Ruta para la lista de doctores
    Route::get('/doctors', function () {
        return view('doctor_profiles.index'); // Vista que incluye <livewire:doctor-profile-list />
    })->name('doctors.index');


    // Ruta para otras listas específicas (si se necesita en el futuro)
    // Ejemplo: Ruta para empresas
    Route::get('/companies', function () {
        return view('company_profiles.index'); // Vista que incluye <livewire:company-profile-list />
    })->name('companies.index');

    Route::get('/patients', function () {
        return view('patient_profiles.index'); // Vista que incluye <livewire:company-profile-list />
    })->name('patients.index');

    Route::get('/assistants', function () {
        return view('assistant_profiles.index'); // Vista que incluye <livewire:company-profile-list />
    })->name('assistants.index');

    Route::get('/agendas', function () {
        return view('agendas.index'); 
    })->name('agendas.index');
    

});

