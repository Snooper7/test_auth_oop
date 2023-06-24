<?php

namespace App\Services;
class Router
{
    /**
     * Создаем список всех рутов на сайте, куда будем заносить get параметры запросов
     */
    private static array $list = [];

    /**
     * Метод регистрирует роут для страницы, путем занесения в список всех рутов на сайте
     */

    public static function page($uri, $page_name): void
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
        ];
    }

    /**
     * Метод "активирует" Рутер прикрепляя нужный вид путем перебора списка всех рутов
     * и сравнения с данными в get запросе.
     * Если не нахоит такой рут направляет на страницу 404
     */
    public static function enable(): void
    {
        $query = $_GET['q'];

        foreach (self::$list as $route) {
            if ($route["uri"] === '/' . $query) {
                require_once "views/pages/" . $route["page"] . ".php";
                die();
            }
        }

        self::no_page_found();
    }

    /**
     * Метод перенаправления на страницу 404
     */
    private static function no_page_found(): void
    {
        require_once "views/errors/404.php";
    }
}