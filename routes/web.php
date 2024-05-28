<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// home

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class,'index']);
Route::get('/about', [PagesController::class,'about']);
Route::get('/services', [PagesController::class,'services']);

// Route::get('/posts', \App\Http\Controllers\PostsController::class.'@index');

Route::resource('/posts', PostsController::class);
// ->middleware('auth')

// Route to display the registration form
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Route to handle the form submission
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
// end home

require __DIR__.'/auth.php';



// about
Route::get('/about', function(){
    return view('pages.about');
});
// end about


// users
Route::get('/users/{id}', function($id){
    return 'This is user '.$id;
});


Route::get('/users/{id}/{name}', function($name, $id){
    return "This is user " . $name . ' with an id of ' . $id;

});
// users


Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resource('posts', 'PostsController')->names([
//     'index' => 'posts.index',
//     'create' => 'posts.create',
//     'store' => 'posts.store',
//     'show' => 'posts.show',
//     'edit' => 'posts.edit',
//     'update' => 'posts.update',
//     'destroy' => 'posts.destroy',
// ]);


