<?php

use App\Services\Router;
use App\Controllers\Auth;

Router::page('/', 'home');
Router::page('/login', 'login');
Router::page('/register', 'register');
Router::page('/admin', 'admin');
Router::page('/profile', 'profile');

Router::post('/auth/register', Auth::class, 'register');
Router::post('/auth/login', Auth::class, 'login');
Router::post('/auth/logout', Auth::class, 'logout');

Router::enable();