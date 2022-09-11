<?php

namespace WebreatheTest\app;

use WebreatheTest\app\WebreatheTestUser as User;

class WebreatheFormControl
{
    public static function onPost()
    {
        if (isset($_GET["request"]) && 'signup' === $_GET["request"]) {
            $userName = filter_input(INPUT_POST, 'login');
            $pass = filter_input(INPUT_POST, 'pass');
            $user = new User($userName, $pass);
            unset($_POST);
            header("location:".$user->getUrl());
        } elseif (isset($_GET["request"]) && 'login' === $_GET["request"]) {
            $userName = filter_input(INPUT_POST, 'login');
            $pass = filter_input(INPUT_POST, 'pass');
            $user = new User($userName, $pass, 'login');
            unset($_POST);
            header("location:".$user->getUrl());
        }
    }

    public static function onGet()
    {
    }

    public static function getRequestName()
    {
        return array('login', 'signup', 'add-module', 'delete-module');
    }
}
