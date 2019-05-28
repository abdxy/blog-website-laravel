<?php
use Illuminate\Support\Facades\Route;

Route::get('/', "Articles\IndexController@index")->name('home');

Route::get('/articles/{slug}', "Articles\ShowArticleController@show")->name("article.show");

Route::get('/users/{name}', "Users\UserController@showProfile")->name("user.profile");
Route::get('/users', "Users\AllUsersController@index")->name("Users.all");




// Route::get('/category/{slug}', 'CategoriesController@index').name("Categories.show");

// Route::get('/articles/{slug}','ArticlesController@show').name("articles.show");

 Route::group(['middleware' => ['guest']], function (){

//     Route::get('/Admin-login','AdminController@login').name("admin.login");


Route::get('/login','Users\UserSessionController@loginPage')->name("user.loginPage");
Route::post('/login','Users\UserSessionController@login')->name("user.login");
Route::get('/register','Users\UserController@register')->name("user.register");
Route::post('/register','Users\UserController@store')->name("user.register.create");
    
 });

 Route::group(['middleware' => ['auth:users']], function () {

//     Route::get('/profile', 'UserController@showprofile').name("account.profile");

   Route::get('/logout', 'Users\UserSessionController@logout')->name("user.logout");

//      Route::get('/account/logout', 'UserController@logout').name("account.logout");
    
//     Route::get('/articles/create', 'ArticlesController@create').name("articles.create");

//     Route::get('/articles/{id}/edit', 'ArticlesController@edit').name("articles.edit");

//     Route::post('/articles', 'ArticlesController@store').name("articles.store");

//     Route::patch('/articles/{id}','ArticlesController@update').name("articles.update");

    
 });
// Route::group(['middleware' => ['admin']], function () {


//     Route::get('/Admin-dashboard/add-super', 'AdminController@addSuper').name("admin.addsuper");

//     Route::post('/Admin-dashboard/add-super', 'AdminController@store').name("admin.store");
    


// });

// Route::group(['middleware' => ['supervisor']], function () {


//     Route::get('/supervisor/reviews', 'SupervisorController@reviews').name("super.reviews");

//     Route::post('/supervisor/review/{id}', 'SupervisorController@artcileReview').name("super.artcileReview");
    

// });

