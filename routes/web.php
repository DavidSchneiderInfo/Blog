<?php

use App\Http\Controllers\Backend\Posts\CreatePostsController;
use App\Http\Controllers\Backend\Posts\DeletePostController;
use App\Http\Controllers\Backend\Posts\EditPostController;
use App\Http\Controllers\Backend\Posts\PreviewPostController;
use App\Http\Controllers\Backend\Posts\ShowPostListController;
use App\Http\Controllers\Backend\Posts\StorePostController;
use App\Http\Controllers\Backend\Posts\UpdatePostController;
use App\Http\Controllers\Backend\Profile\ExportDataController;
use App\Http\Controllers\Backend\Profile\ImportDataController;
use App\Http\Controllers\Backend\Profile\ShowProfileController;
use App\Http\Controllers\Blog\ShowPostsController;
use App\Http\Controllers\Blog\ShowSinglePostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Legal\AgreeToTermsOfServiceController;
use App\Http\Controllers\Legal\ShowCopyrightController;
use App\Http\Controllers\Legal\ShowDisclaimerController;
use App\Http\Controllers\Legal\ShowNoticeController;
use App\Http\Controllers\Legal\ShowTermsOfServiceController;
use App\Http\Controllers\ShowProjectsController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('copyright', ShowCopyrightController::class)->name('legal.copyright.show');
Route::get('disclaimer', ShowDisclaimerController::class)->name('legal.disclaimer.show');
Route::get('legal_notice', ShowNoticeController::class)->name('legal.notice.show');
Route::get('terms_of_service', ShowTermsOfServiceController::class)->name('legal.tos.show');
Route::post('terms_of_service', AgreeToTermsOfServiceController::class)->name('legal.tos.agree');

Route::middleware('tos_agreed')->group(function () {

    Route::get('projects', ShowProjectsController::class)->name('projects.show');

    Route::get('blog', ShowPostsController::class)->name('blog.index');
    Route::get('blog/{blog}', ShowSinglePostController::class)->name('blog.show');

    Route::get('/', HomepageController::class);

    Route::get('blog', ShowPostsController::class)->name('blog.index');

    Auth::routes(['verify' => true]);

    Route::middleware('auth')->group(function () {

        Route::get(RouteServiceProvider::HOME, [DashboardController::class, 'index'])->name('home');

        Route::prefix(RouteServiceProvider::BACKEND)->middleware('verified')->group(function () {

            // Posts
            Route::get('posts', ShowPostListController::class)->name('backend.posts.index');
            Route::get('posts/create', CreatePostsController::class)->name('backend.posts.create');
            Route::post('posts', StorePostController::class)->name('backend.posts.store');
            Route::get('posts/{post}', PreviewPostController::class)->name('backend.posts.preview');
            Route::get('posts/{post}/edit', EditPostController::class)->name('backend.posts.edit');
            Route::put('posts/{post}', UpdatePostController::class)->name('backend.posts.update');
            Route::delete('posts/{post}', DeletePostController::class)->name('backend.posts.delete');

            // Profile
            Route::get('profile', ShowProfileController::class)->name('backend.profile.index');
            Route::post('profile/export', ExportDataController::class)->name('backend.profile.export');
            Route::post('profile/import', ImportDataController::class)->name('backend.profile.import');
        });
    });
});
