<?php
//Главная страница в админпанели
class AdminController extends AdminBase
{
     //"Панель администратора"
    public function actionIndex()
    {
        self::checkAdminOrNot();
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

}