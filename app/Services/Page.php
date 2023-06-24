<?php

namespace App\Services;

class Page
{
    public static function part($partname): void
    {
        require_once "views/admin/components/" . $partname . ".php";
    }
}