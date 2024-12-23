<?php
use App\Http\Controllers\NHT_QUAN_TRIController;
use Illuminate\Support\Facades\Route;

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
Route::get('admins/nht-login',[NHT_QUAN_TRIController::class,'nhtlogin'])->name('admins.nhtlogin');
Route::post('/admins/nht-login',[NHT_QUAN_TRIController::class,'nhtloginSubmit'])->name('admins.nhtloginSubmit');

# Admin Routes
Route::get('/nht-admins', function() {
    return view('nhtAdmins.index');
});