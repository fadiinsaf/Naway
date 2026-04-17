<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('artist.index');
});

Route::get('/artists', function () {
    return view('artist.index');
});

Route::get('/instruments', function () {
    return view('instrument.index');
});

Route::get('/maqams', function () {
    return view('maqam.index');
});

Route::get('/rhythms', function () {
    return view('rhythm.index');
});

Route::get('/genres', function () {
    return view('genre.index');
});

Route::get('/signin', function () {
    return view('auth.signin');
});

Route::get('/signup', function () {
    return view('auth.signup');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/social', function () {
    return view('social.index');
});

Route::get('/messages', function () {
    return view('social.messages');
});

Route::get('/conversation', function () {
    return view('social.conversation');
});

Route::get('/game', function () {
    return view('game.index');
});

Route::get('/instruments/show', function () {
    return view('instrument.show');
});

Route::get('/artists/show', function () {
    return view('artist.show');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/artists', function () {
    return view('admin.artists.index');
});

Route::get('/admin/instruments', function () {
    return view('admin.instruments.index');
});

Route::get('/admin/rhythms', function () {
    return view('admin.rhythms.index');
});

Route::get('/admin/genres', function () {
    return view('admin.genres.index');
});

Route::get('/admin/users', function () {
    return view('admin.users.index');
});

Route::get('/admin/maqams', function () {
    return view('admin.maqams.index');
});

Route::get('/admin/comments', function () {
    return view('admin.comments.index');
});
