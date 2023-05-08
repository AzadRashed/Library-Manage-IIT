<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\RequestBookController; 
use App\Http\Controllers\ApprovedBookController; 
use App\Http\Controllers\IssueBookController; 
use App\Http\Controllers\ReturnBookController; 
use App\Http\Controllers\ReissueBookController; 
use App\Http\Controllers\TeacherController; 
use App\Http\Controllers\StudentController; 
use App\Http\Controllers\ContactUsController; 
use App\Http\Controllers\AboutUsController; 
use App\Http\Controllers\EventController; 
use App\Http\Controllers\ProfileController; 
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
    return view('frontend/home');
})->name('homepage');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// frontend all route
Route::middleware('auth')->controller(LibraryController::class)->group(function(){
 
    Route::get('/library-dashboard','index')->name('library-dashboard');
    Route::get('/get-book','booklist')->name('get-book');
    Route::get('/teacher-list','teacherlist')->name('teacher-list');
    Route::get('/student-list','studentlist')->name('student-list');
    Route::post('/book/request','request_store')->name('book.request');
    Route::get('/request-cancel/{id}/{book_id}','destroy')->name('request.destroy');
    Route::get('/user-reissue/{id}','reissue')->name('user.reissue');

});

Route::middleware('auth')->controller(ContactUsController::class)->group(function(){
 
  Route::get('/user/contactus','index')->name('user.contactus.index');
  Route::Post('/contactus','store')->name('user.contactus.store');

});

Route::middleware('auth')->controller(AboutUsController::class)->group(function(){
 
  Route::get('/user/aboutus','index')->name('user.aboutus.index');
});

Route::middleware('auth')->controller(EventController::class)->group(function(){
 
  Route::get('/user/event','index')->name('user.event.index');
});

Route::middleware('auth')->controller(ProfileController::class)->group(function(){
 
  Route::get('/user/profile','index')->name('user.profile.index');
  Route::patch('/user/profile','updateProfile')->name('user.profile.update');
  Route::patch('/change/password','changePassword')->name('user.change.password');
});

// end frontend all route

// admin category,carousel,and book add
 Route::resource('categories', CategoryController::class)->middleware('auth');
 Route::resource('carousels', CarouselController::class)->middleware('auth');
 Route::resource('books', BookController::class)->middleware('auth');
// end admin category,carousel,and book add


//  student and teacher user list of admin 
 Route::resource('teachers', TeacherController::class)->middleware('auth');
 Route::resource('students', StudentController::class)->middleware('auth');
// end student and teacher user list of admin 


// manage library book request and status change of admin
Route::middleware('auth')->controller(RequestBookController::class)->group(function(){
 
  Route::get('/requestbooks','index')->name('request.book.index');
  Route::get('/requestbooks/{id}/{book_id}','approved')->name('request.book.approved');

});

Route::middleware('auth')->controller(ApprovedBookController::class)->group(function(){
 
  Route::get('/approvedbooks','index')->name('approved.book.index');
  Route::get('/approvedbooks/{id}','issue')->name('approved.book.issue');

});

Route::middleware('auth')->controller(IssueBookController::class)->group(function(){
 
  Route::get('/issuebooks','index')->name('issue.book.index');
  Route::get('/issuebooks/{id}/{book_id}','return')->name('issue.book.return');

});
Route::middleware('auth')->controller(ReturnBookController::class)->group(function(){
 
  Route::get('/returnbooks','index')->name('return.book.index');

});
Route::middleware('auth')->controller(ReissueBookController::class)->group(function(){
 
  Route::get('/reissuebooks','index')->name('reissue.book.index');
  Route::get('/reissuebooks/{id}','reissue')->name('reissue.book.reissue');

});
//end manage book library request and status change of admin



 
 