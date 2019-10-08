<?php

use App\Mail\Test;
use App\Jobs\TestJob;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    $users =  User::pluck('email')->toArray();
    foreach ($users as $user) {
        TestJob::dispatch($user)->delay(now()->addSeconds(15));
    }
    // $to = "amar@sss.com";
    // Mail::to($to)->send(new Test());
    return view('welcome');
});
