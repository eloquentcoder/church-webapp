<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@showAboutPage')->name('about');

Route::get('events', 'HomeController@showEventsPage')->name('events');
Route::get('events/{slug}', 'HomeController@viewEventPage')->name('events.view');
Route::get('event/{id}/reserve', 'HomeController@showReserveSeatPage')->name('reserve-seat');
Route::post('event/reservations', 'HomeController@postReservations')->name('reserve-seat.post');

Route::get('sermons', 'HomeController@showSermonsPage')->name('sermons');
Route::get('sermon/{slug}', 'HomeController@viewSermonPage')->name('sermon.view');

Route::get('testimonies', 'HomeController@showTestimoniesPage')->name('testimonies');
Route::get('testimony/make', 'HomeController@makeTestimonyPage')->name('testimony.make');

Route::get('contact-us', 'HomeController@showContactPage')->name('contact');
Route::post('contact-us', 'HomeController@postContact')->name('contact.post');

Route::get('donations', 'HomeController@showDonationsPage')->name('donations');

Route::get('prayer-requests', 'HomeController@showPrayerRequestPage')->name('prayer-request');
Route::post('prayer-requests', 'HomeController@prayerRequest')->name('request.post');


Route::post('newsletter', 'HomeController@newsletter')->name('newsletter');

Route::group(['prefix' => 'admin/prophetic-tribe'], function () {
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.post.login');

    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('events', 'Admin\DashboardController@showEventsPage')->name('admin.events');
    Route::get('events/create', 'Admin\DashboardController@createEventPage')->name('admin.events.create');
    Route::post('events/create', 'Admin\DashboardController@postEvent')->name('admin.events.post');
    Route::get('event/{id}/edit', 'Admin\DashboardController@editEventPage')->name('admin.event.edit');
    Route::post('event/{id}/update', 'Admin\DashboardController@updateEvent')->name('admin.event.update');
    Route::get('event/{id}delete', 'Admin\DashboardController@deleteEvent')->name('admin.event.delete');

    Route::get('prayer-requests', 'Admin\DashboardController@showPrayerRequestsPage')->name('admin.prayer-requests');

    Route::get('testimonies', 'Admin\DashboardController@showTestimoniesPage')->name('admin.testimonies');
    Route::get('testimonies/create', 'Admin\DashboardController@showCreateTestimony')->name('admin.testimony.create');
    Route::post('testimonies/create', 'Admin\DashboardController@postTestimony')->name('admin.testimonies.post');
    Route::get('testimony/{id}delete', 'Admin\DashboardController@deleteTestimony')->name('admin.testimony.delete');

    Route::get('blog-posts', 'Admin\DashboardController@showBlogPostsPage')->name('admin.blog-posts');
    Route::get('blog-posts/create', 'Admin\DashboardController@createPostPage')->name('admin.blog-post.create');
    Route::post('blog-posts/create', 'Admin\DashboardController@createPost')->name('admin.blog-post.create.post');
    Route::get('blog-post/{id}/edit', 'Admin\DashboardController@editPostPage')->name('admin.blog-post.edit');
    Route::post('blog-post/{id}/update', 'Admin\DashboardController@updatePost')->name('admin.blog-post.update');
    Route::get('blog-post/{id}delete', 'Admin\DashboardController@deletePost')->name('admin.blog-post.delete');

    Route::get('sermons', 'Admin\DashboardController@showSermonsPage')->name('admin.sermons');
    Route::get('sermons/create', 'Admin\DashboardController@createSermonsPage')->name('admin.sermons.create');
    Route::post('sermons/create', 'Admin\DashboardController@postSermon')->name('admin.sermons.create.post');
    Route::get('sermon/{id}/edit', 'Admin\DashboardController@editSermonPage')->name('admin.sermon.edit');
    Route::post('sermon/{id}/update', 'Admin\DashboardController@updateSermon')->name('admin.sermon.update');
    Route::get('sermon/{id}delete', 'Admin\DashboardController@deleteSermon')->name('admin.sermon.delete');

    Route::get('settings', 'Admin\DashboardController@settingsPage')->name('admin.settings');
    Route::post('settings', 'Admin\DashboardController@postSettings')->name('admin.settings.post');

    Route::get('members', 'Admin\DashboardController@getMembersPage')->name('admin.members');
    Route::get('members/create', 'Admin\DashboardController@createMemberPage')->name('admin.members.create');
    Route::post('members/create', 'Admin\DashboardController@postMember')->name('admin.members.create.post');
    Route::get('member/{id}/edit', 'Admin\DashboardController@editMember')->name('admin.member.edit');
    Route::get('members/send', 'Admin\DashboardController@sendMessage')->name('admin.send.message');
    Route::post('members/send', 'Admin\DashboardController@postSendMessage')->name('admin.message.send.post');

    Route::get('newsletter', 'Admin\DashboardController@getNewsletterPage')->name('admin.newsletter');
    Route::get('newsletter/send', 'Admin\DashboardController@sendNewsletterPage')->name('admin.newsletter.send');
    Route::post('newsletter/send', 'Admin\DashboardController@sendNewsletter')->name('admin.newsletter.send.post');

});
