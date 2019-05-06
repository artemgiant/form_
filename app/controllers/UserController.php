<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 05.05.2019
 * Time: 18:45
 */

namespace app\controllers;


class UserController
{
    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }
}