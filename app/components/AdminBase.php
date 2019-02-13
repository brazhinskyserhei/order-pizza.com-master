<?php

abstract class AdminBase
{
    //Метод для проверки является ли пользователь админом
    public static function checkAdminOrNot()
    {
        $checkUserId = User::checkLogged();
        $user = User::getUserById($checkUserId);
        if ($user['role'] == 'admin') {
            return true;
        }
        header("Location: /");
    }
}