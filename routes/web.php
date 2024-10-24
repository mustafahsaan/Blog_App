<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;

//Theme Route
Route::controller(ThemeController::class)->name('theme.')->group(function(){
Route::get('/', 'index')->name('index');
Route::get('/cutegory/{id}', 'cutegory')->name('cutegory');
Route::get('/contact', 'contact')->name('contact');
//Route::get('/single-blog', 'singleBlog')->name('singleBlog');
});



//subscriber Route
Route::post('/subscriber/store',[SubscriberController::class,'store'])->name('subscriber.store');



//contact Route
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');



//BLOG Route
Route::get('/my-blogs',[BlogController::class,'myBlogs'])->name('blogs.my-blogs');
Route::resource('blogs',BlogController::class)->except('index');


//comment Route
Route::post('/comments/store',[CommentController::class,'store'])->name('comments.store');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
