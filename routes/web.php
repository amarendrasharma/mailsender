<?php

use App\Mail\Test;
use App\Jobs\TestJob;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    // return Excel::download(new UsersExport, 'users.xlsx');

    // Excel::import(new UsersImport, 'users.xlxs');
    $users =  User::pluck('email')->toArray();
    foreach ($users as $user) {
        TestJob::dispatch($user)->delay(now()->addSeconds(15));
    }
    // $to = "amar@sss.com";
    // Mail::to($to)->send(new Test());
    return view('welcome');
});




Route::get("/import", 'UploadExcelController@create');
Route::post("/import/excel", 'UploadExcelController@store');

Route::name('jobs')->get('/jobs', 'HomeController@jobs');
Route::name('simulate')->get('/simulate', 'HomeController@simulate');
Route::name('home')->get('/home', 'HomeController@index');
Route::get('/upload', function () {
    return view('upload.upload');
});
Route::name('file.index')->get('/file', 'FileRecordController@index');
Route::name('file.post')->post('/file', 'FileRecordController@store');
Route::name('file.delete')->delete('/file/{fileRecord}', 'FileRecordController@destroy');


// Route::get('/home', 'HomeController@index')->name('home');

// nov 6 ,19
Route::get('/list-emails', 'CampaignController@index');
Route::post('/list-emails', 'CampaignController@store');

// 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
