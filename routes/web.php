<?php

//use Illuminate\Support\Facades\Auth;


use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Userprofile;
use App\Http\Livewire\Annualpayment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Experience;
use App\Http\Livewire\Membershipupgrade;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   // Route::get('/dashboards', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/annual-payment', Annualpayment::class)->name('annualpayment');
    Route::get('/profile', Userprofile::class)->name('profile');
    Route::get('/workexperience', Experience::class)->name('experience');
    Route::get('/upgrade', Membershipupgrade::class)->name('memberupgrade');
});


// Laravel 8 & 9
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

// callback for new membership registration
Route::get('/payment/callback', [Dashboard::class, 'handleGatewayCallback'])->name('callback');

// callback for new membership annual payment
Route::get('/payment/annual', [Annualpayment::class, 'handleGatewayAnnual'])->name('annual');