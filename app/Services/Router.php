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
     * Метод post предназначен чтобы производить различные действия над данным ипоступающими из форм.
     * Механизм похож на метод для работы со страницами
     * В аргументах он принимает ссылку, контроллер и метод которым нужно обрабатывать данные.
     */
    public static function post($uri, $class, $method): void
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "post" => true,
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
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $action = new $route["class"];
                    $method = $route["method"];
                    $action->$method($_POST);
                    die();
                } else {
                    require_once "views/pages/" . $route["page"] . ".php";
                    die();
                }
            }
        }

        self::error('404');
    }

    /**
     * Метод перенаправления на страницу ошибки
     */
    public static function error($error): void
    {
        require_once "views/errors/" . $error . ".php";
    }

    /**
     * Метод перенаправления после action
     */
    public static function redirect($uri): void
    {
        header('Location:' . $uri);
        die();
    }


}