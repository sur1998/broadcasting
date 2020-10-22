<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\SendMailJob;
use Carbon\carbon;
use App\Models\User;
use App\Notifications\MailSent;
use App\Events\TaskEvent;

//use Illuminate\Support\Facades\Mail;
//use App\Mail\SendEmail;

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
Route::get('/',function(){
    return view('welcome');
});

Route::get('user', function () {
    User::find(1)->notify(new MailSent());
    return "SUCCESSFULL!!!";
    //return view('welcome');
});
Route::get('event', function(){
    event(new TaskEvent('Whats New!!'));

});
Route::get('listen',function(){
    return view('listen');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('sendmail',function(){
 $job = (new SendMailJob())
         ->delay(Carbon::now()->addSeconds(5));
         dispatch($job);
 return "Mail is sent successfully";
 
});
