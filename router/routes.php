<?php

use App\Services\Router;

Router::page('/login', 'login');
Router::page('/register', 'register');
Router::page('/', 'home');
Router::page('/admin', 'admin');


Router::enable();