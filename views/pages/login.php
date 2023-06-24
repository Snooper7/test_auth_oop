<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AUTH OOP</title>
    <meta name="author" content="Snooper">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
        }
    </style>
</head>
<body class="body-bg min-h-screen pt-3 md:pt-10 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Test Authorization OOP</h1>
    </a>
</header>

<main class="bg-white max-w-lg mx-auto p-6 md:p-8 my-10 rounded-lg shadow-2xl">
    <section>
        <h3 class="font-bold text-2xl">Welcome to TestAuth</h3>
        <p class="text-gray-600 pt-2">Sign in to your account.</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="vendor/signin.php">
            <div class="mb-3 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="login">Email or Phone</label>
                <input type="text" name="login" id="login" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
            </div>
            <div class="mb-3 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
            </div>
            <div class="flex justify-end">
                <a href="#" class="text-sm text-purple-600 hover:text-purple-700 hover:underline mb-6">Forgot your password?</a>
            </div>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
        </form>
    </section>
    <?php

    /**
     * Вывод сообщения об ошибке, текст которого берется из сессии.
     */

    if (isset($_SESSION['message'])) {
        echo '
                <section class="mt-10">
                    <div class="block w-full">
                        <div class="font-bold relative mb-4 block w-full rounded bg-green-500 p-3 text-center leading-5 text-white opacity-100">
                           ' . $_SESSION['message'] . '
                        </div>
                    </div>
                </section>
            ';
    }
    unset($_SESSION['message']);
    ?>
</main>

<div class="max-w-lg mx-auto text-center mt-12 mb-6">
    <p class="text-white">Don't have an account? <a href="/register" class="font-bold hover:underline">Sign up</a>.</p>
</div>

<footer class="max-w-lg mx-auto flex justify-center text-white">
    <a href="/" class="hover:underline">Home</a>
</footer>
</body>
</html>