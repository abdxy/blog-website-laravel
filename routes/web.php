<?php


Route::get('/', "Articles\IndexController@index");
Route::get('/articles/{slug}', "Articles\ShowArticleController@show")->name("article.show");

// Route::get('/users/{id}', "UserController@index").name("user.profile");

// Route::get('/category/{slug}', 'CategoriesController@index').name("Categories.show");

// Route::get('/articles/{slug}','ArticlesController@show').name("articles.show");

// Route::group(['middleware' => ['guest']], function (){

//     Route::get('/Admin-login','AdminController@login').name("admin.login");

//     Route::get('/login','UserController@login').name("user.login");
    
//     Route::get('/register','UserController@register').name("user.register");
    
// });

// Route::group(['middleware' => ['users']], function () {

//     Route::get('/profile', 'UserController@showprofile').name("account.profile");

//     Route::get('/account/logout', 'UserController@logout').name("account.logout");

//      Route::get('/account/logout', 'UserController@logout').name("account.logout");
    
//     Route::get('/articles/create', 'ArticlesController@create').name("articles.create");

//     Route::get('/articles/{id}/edit', 'ArticlesController@edit').name("articles.edit");

//     Route::post('/articles', 'ArticlesController@store').name("articles.store");

//     Route::patch('/articles/{id}','ArticlesController@update').name("articles.update");

    
// });
// Route::group(['middleware' => ['admin']], function () {


//     Route::get('/Admin-dashboard/add-super', 'AdminController@addSuper').name("admin.addsuper");

//     Route::post('/Admin-dashboard/add-super', 'AdminController@store').name("admin.store");
    


// });

// Route::group(['middleware' => ['supervisor']], function () {


//     Route::get('/supervisor/reviews', 'SupervisorController@reviews').name("super.reviews");

//     Route::post('/supervisor/review/{id}', 'SupervisorController@artcileReview').name("super.artcileReview");
    

// });

