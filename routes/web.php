<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/


Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('front.index');
Route::post('/donation-verify', [\App\Http\Controllers\Front\DonationController::class, 'verifyDonation'])->name('front.donation.verify');

Route::get('/blog-detail', [\App\Http\Controllers\Front\IndexController::class, 'getBlogs'])->name('blogs.blog-detail');
Route::get('/comment-detail', [\App\Http\Controllers\Front\IndexController::class, 'getComments'])->name('comments.blog-detail');
Route::get('/campaign-detail', [\App\Http\Controllers\Front\IndexController::class, 'getCampaigns'])->name('campaigns.campaign-detail');
Route::get('/dogs', [\App\Http\Controllers\Front\IndexController::class, 'getDogs'])->name('dogs.archive');

Route::get('/volunteers', [\App\Http\Controllers\Front\VolunteerController::class, 'index'])->name('front.volunteer');
Route::get('/report', [\App\Http\Controllers\Front\ReportController::class, 'index'])->name('front.report');

Route::get('/dog-details', [\App\Http\Controllers\Front\DogDetailController::class, 'index'])->name('front.dogdetails');
Route::get('/blogs', [\App\Http\Controllers\Front\BlogController::class, 'index'])->name('front.blogs');


Route::post('/volunteers', [\App\Http\Controllers\Front\VolunteerController::class, 'store'])->name('front.volunteer.store');
Route::post('/reports/store', [\App\Http\Controllers\Front\ReportController::class, 'store'])->name('front.reports.store');
Route::post('/comments/store', [\App\Http\Controllers\Front\CommentController::class, 'store'])->name('front.comments.store');
Route::post('/dog-detail/store', [\App\Http\Controllers\Front\DogDetailController::class, 'store'])->name('front.dogdetail.store');


Route::get('/dogs/detail/{id}', [\App\Http\Controllers\Front\IndexController::class, 'dogDetail'])->name('dogs.detail');
Route::get('/blogs/blog/{id}', [\App\Http\Controllers\Front\IndexController::class, 'blogDetail'])->name('blogs.detail');
Route::get('/campaigns/detail/{id}', [\App\Http\Controllers\Front\IndexController::class, 'campaignDetail'])->name('campaigns.detail');

Route::group(['middleware' => ['auth','verified']], function () {
    Route::post('/dogs/adoption/{dog}', [\App\Http\Controllers\Front\AdoptionController::class, 'adoption'])->name('dogs.adopt');

    Route::post('/campaigns/user-store/{user_id}', [\App\Http\Controllers\Front\CampaignVolunteerController::class, 'storeUsers'])->name('participant.userStore');
    Route::get('/campaigns/volunteer-store/{volunteer_id}/{campaign_id}', [\App\Http\Controllers\Front\CampaignVolunteerController::class, 'storeVolunteers'])->name('participant.volunteerStore');

//    Route::group(['prefix' => 'dashboard'], function () {
//        Route::get('/', [\App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('dashboard.index');
//        Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
//        Route::post('/dogs/{dog}/toggle-status', [\App\Http\Controllers\Dashboard\DogController::class, 'toggleStatus'])->name('dogs.toggleStatus');
//        Route::resource('dogs', \App\Http\Controllers\Dashboard\DogController::class);
//        Route::resource('categories', \App\Http\Controllers\Dashboard\CategoryController::class);
//        Route::resource('campaigns', \App\Http\Controllers\Dashboard\CampaignController::class);

//        Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
//        Route::resource('posts', \App\Http\Controllers\Dashboard\PostController::class);

//        Route::get('/verifyVolunteer/{id}', [\App\Http\Controllers\Dashboard\VolunteerController::class, 'verifyVolunteer'])->name('verifyVolunteer');
//        Route::get('/rejectVolunteer/{id}', [\App\Http\Controllers\Dashboard\VolunteerController::class, 'rejectVolunteer'])->name('rejectVolunteer');
//        Route::resource('volunteers', \App\Http\Controllers\Dashboard\VolunteerController::class)->only(['index', 'show', 'delete']);
//        Route::get('/notifications', [\App\Http\Controllers\Dashboard\NotificationController::class, 'index'])->name('notifications.index');
//        Route::resource('reports', \App\Http\Controllers\Dashboard\ReportController::class);
//        Route::get('/notifications', [\App\Http\Controllers\Dashboard\NotificationController::class, 'index'])->name('notifications.index');
//        Route::post('/notifications/mark', [\App\Http\Controllers\Dashboard\NotificationController::class, 'markNotifications'])->name('notifications.mark');


        Route::group(['middleware' => ['isAdmin','verified']], function () {
            Route::group(['prefix' => 'dashboard'], function () {
                Route::get('/', [\App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('dashboard.index');
                Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
                Route::post('/dogs/{dog}/toggle-status', [\App\Http\Controllers\Dashboard\DogController::class, 'toggleStatus'])->name('dogs.toggleStatus');
                Route::resource('dogs', \App\Http\Controllers\Dashboard\DogController::class);
                Route::resource('categories', \App\Http\Controllers\Dashboard\CategoryController::class);
                 Route::resource('campaigns', \App\Http\Controllers\Dashboard\CampaignController::class);
                Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
                Route::resource('posts', \App\Http\Controllers\Dashboard\PostController::class);
                Route::get('/verifyVolunteer/{id}', [\App\Http\Controllers\Dashboard\VolunteerController::class, 'verifyVolunteer'])->name('verifyVolunteer');
                Route::get('/rejectVolunteer/{id}', [\App\Http\Controllers\Dashboard\VolunteerController::class, 'rejectVolunteer'])->name('rejectVolunteer');
                Route::resource('volunteers', \App\Http\Controllers\Dashboard\VolunteerController::class)->only(['index', 'show', 'delete']);
                Route::get('/notifications', [\App\Http\Controllers\Dashboard\NotificationController::class, 'index'])->name('notifications.index');
                Route::resource('reports', \App\Http\Controllers\Dashboard\ReportController::class);
                Route::get('/notifications', [\App\Http\Controllers\Dashboard\NotificationController::class, 'index'])->name('notifications.index');
                Route::post('/notifications/mark', [\App\Http\Controllers\Dashboard\NotificationController::class, 'markNotifications'])->name('notifications.mark');
            });

        });

//    });
});
