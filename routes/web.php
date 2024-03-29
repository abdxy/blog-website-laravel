<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {

    Route::get("/dashboard/login", "DashBoard\AdminController@logInPage")->name("admin.logInPage");
    Route::post("/dashboard/login", "DashBoard\AdminController@logIn")->name("admin.login");
    Route::get('/login', 'Users\UserSessionController@loginPage')->name("user.loginPage");
    Route::post('/login', 'Users\UserSessionController@login')->name("user.login");
    Route::get('/register', 'Users\UserController@register')->name("user.register");
    Route::post('/register', 'Users\UserController@store')->name("user.register.create");
});

Route::group(['middleware' => ['auth:users']], function () {


    Route::patch("/users/{id}", "Users\UserController@update")->name("user.update");

    Route::get('/logout', 'Users\UserSessionController@logout')->name("user.logout");


    Route::get('/articles/create', 'Articles\ArticlesController@create')->name("articles.create");

    Route::get('/articles/{id}/edit', 'Articles\ArticlesController@edit')->name("articles.edit");

    Route::post('/articles', 'Articles\ArticlesController@store')->name("articles.store");

    Route::patch('/articles/{id}', 'Articles\ArticlesController@update')->name("articles.update");

    Route::get("/users/{id}/edit", "Users\UserController@edit")->name("user.edit");

    Route::patch("/users/{id}", "Users\UserController@update")->name("user.update");
});
    Route::group(['middleware' => ['auth:admin']], function () {

         Route::get("/dashboard", "DashBoard\AdminController@dashboard")->name("admin.dashboard");

         Route::get('/dashboard/add-super', 'DashBoard\AdminController@addSuper')->name("admin.addSuper");

         Route::post('/dashboard/add-super', 'DashBoard\AdminController@storeSuper')->name("admin.storeSuper");

     });

 Route::group(['middleware' => ['auth:supervisor']], function () {

    Route::get("super/dashboard", "DashBoard\AdminController@superDashBoard")->name("supervisor.dashboard");
   
    //     Route::get('/supervisor/reviews', 'SupervisorController@reviews').name("super.reviews");

    //     Route::post('/supervisor/review/{id}', 'SupervisorController@artcileReview').name("super.artcileReview");


    });

    Route::get('/', "Articles\IndexController@index")->name('home');

    Route::get('/articles/{slug}', "Articles\ShowArticleController@show")->name("article.show");

    Route::get('/users/{name}', "Users\UserController@showProfile")->name("user.profile");

    Route::get('/users', "Users\AllUsersController@index")->name("Users.all");

    Route::get("/tags", "TagsController@index")->name("tags");

    Route::get("/categories", "CategoriesController@index")->name("categories");

    Route::get("/categories/{name}", "CategoriesController@show")->name("category");

    Route::get("/articles", function () {
        return redirect('/');
    });

    Route::get("/tags/{name}", "TagsController@show")->name("tag");

    

