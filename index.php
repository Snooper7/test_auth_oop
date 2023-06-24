<?php

use App\Services\App;
/**
 * Файл index.php является фронт контроллером и только запускает маршрутизацию
 */
require_once __DIR__ . '/vendor/autoload.php';
App::start();
require_once __DIR__ . '/router/routes.php';