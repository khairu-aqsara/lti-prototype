<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/jwks', [\App\Http\Controllers\LtiController::class, 'Jwks'])->name('lti.jwks');
Route::post('/authenticate', [\App\Http\Controllers\LtiController::class, 'authenticate'])->name('lti.authenticate');
Route::post('/launch', [\App\Http\Controllers\LtiController::class, 'launch'])->name('lti.launch');

Route::get('/new', function(){
   $lti = \App\Models\LtiRegistration::create([
       'issuer' => 'https://iomad.local',
       'client_id' => '3ft1J8eR0z1jHIy',
       'login_auth_endpoint' => 'https://iomad.local/mod/lti/auth.php',
       'service_auth_endpoint' => 'https://iomad.local/mod/lti/token.php',
       'jwks_endpoint' => 'https://iomad.local/mod/lti/certs.php',
       'auth_provider' => 'moodle',
       'lti_key_set_id' => 'd48a53de-021f-46f7-a0a4-7134812c2235'
   ]);
});
