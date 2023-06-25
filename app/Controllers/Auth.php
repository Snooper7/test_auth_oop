<?php

namespace App\Controllers;

use App\Services\Router;

class Auth
{
    public function login($data)
    {
        $login = $data["login"];
        $password = $data["password"];

//        $user = \R::findOne('users', 'email = ?', [$login]);
        $user = \R::findOne('users', 'email = :email OR phone = :phone', [':email' => $login, ':phone' => $login]);

        if (!$user){
            die("Пользователь не найден!");
        }

        if (password_verify($password, $user->password)) {
            session_start();
            $_SESSION["user"] = [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "phone" => $user->phone,
            ];
            Router::redirect('/profile');
        } else {
            die("Не верный логин или пароль");
        }
    }

    /**
     * Метод для регистрации пользователя и редирект на страницу логина
     */
    public function register($data): void
    {
        /**
         * Тут можно добавить валидацию полей
         */

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $password = $data["password"];
        $confirm = $data["confirm"];

        if ($password !== $confirm) {
            Router::error('500');
            die();
        }

        $user = \R::dispense('users');
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        \R::store($user);
        Router::redirect('/login');
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        Router::redirect('/');
    }
}