<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SeoController;



Route::get('login', [AuthController::class, 'login']);
Route::post('login-post', [AuthController::class, 'login_post']);
Route::get('registration', [AuthController::class, 'registration']);
Route::post('registration-post', [AuthController::class, 'registration_post']);
Route::get('verify/{token}', [AuthController::class, 'verify']);
Route::get('forgot', [AuthController::class, 'forgot_password']);
Route::get('admin/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'admin'], function() {
    // Users
    Route::get('admin/users', [AccountController::class, 'user_list']);
    Route::get('admin/user/edit/{id}', [AccountController::class, 'user_edit']);
    Route::post('admin/user/update/{id}', [AccountController::class, 'user_update']);
    Route::get('admin/user/softdelete/list', [AccountController::class, 'softdelete_list']);
    Route::get('admin/user/softdelete/{id}', [AccountController::class, 'softdelete']);
    Route::get('admin/user/restore/{id}', [AccountController::class, 'restore']);
    Route::get('admin/user/delete/{id}', [AccountController::class, 'delete']);
    // Categories
    Route::get('admin/categories', [CategoriesController::class, 'categories']);
    Route::get('admin/category/add', [CategoriesController::class, 'add_categories']);
    Route::post('admin/category/add', [CategoriesController::class, 'add_categories_post']);
    Route::get('admin/category/edit/{id}', [CategoriesController::class, 'edit_categories']);
    Route::post('admin/category/edit/{id}', [CategoriesController::class, 'update_categories']);
    Route::get('admin/category/softdelete/list', [CategoriesController::class, 'softdelete_list']);
    Route::get('admin/category/softdelete/{id}', [CategoriesController::class, 'softdelete']);
    Route::get('admin/category/restore/{id}', [CategoriesController::class, 'restore']);
    Route::get('admin/category/delete/{id}', [CategoriesController::class, 'delete']);
    // Logo
    Route::get('admin/logo', [LogoController::class, 'logo']);
    Route::post('admin/logo/update', [LogoController::class, 'logo_update']);
    // Seo
    Route::get('admin/seo', [SeoController::class, 'seo']);
    Route::post('admin/seo/update', [SeoController::class, 'seo_update']);
});

Route::group(['middleware' => 'useradmin'], function() {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/change/password', [AccountController::class, 'ChangePassword']);
    Route::post('admin/change/password', [AccountController::class, 'UpdatePassword']);

    Route::get('admin/account/setting', [AccountController::class, 'AccountSetting']);
    Route::post('admin/account/update/{id}', [AccountController::class, 'AccountSettingUpdate']);
    

    Route::get('admin/blog', [BlogController::class, 'blog']);
    Route::get('admin/blog/add', [BlogController::class, 'add_blog']);
    Route::post('admin/blog/add', [BlogController::class, 'insert_blog']);
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit_blog']);
    Route::post('admin/blog/edit/{id}', [BlogController::class, 'update_blog']);
    Route::get('admin/blog/softdelete/list', [BlogController::class, 'trash_list']);
    Route::get('admin/blog/softdelete/{id}', [BlogController::class, 'softdelete']);
    Route::get('admin/blog/restore/{id}', [BlogController::class, 'restore']);
    Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete']);
    Route::post('blog-comment-submit', [HomeController::class, 'BlogCommentSubmit']);
    Route::post('blog-comment-reply-submit', [HomeController::class, 'BlogCommentReplySubmit']);
});
// Frontend Home
Route::get('/', [HomeController::class, 'home']);
Route::get('about', [HomeController::class, 'about']);
Route::get('class', [HomeController::class, 'classes']);
Route::get('team', [HomeController::class, 'team']);
Route::get('gallery', [HomeController::class, 'gallery']);
Route::get('blog', [HomeController::class, 'blog']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('{slug}', [HomeController::class, 'blogDetails']);




