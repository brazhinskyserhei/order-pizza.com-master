<?php

return array(

    'product/([0-9]+)' => 'product/view/$1', //Страница "Продукт"
    'catalog' => 'catalog/index', //Страница "Каталог"

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //Страница "Товар категории"
    'category/([0-9]+)' => 'catalog/category/$1', //страница "Категория"

    'cart/checkout' => 'cart/checkout', // страница "Оформление заказа"
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1', // удаление и добавление товара в корзину

    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // добавить товар аякс
    'cart' => 'cart/index', // корзина

    'user/register' => 'user/register',  //регистрация пользователя
    'user/login' => 'user/login',       //вход на сайт
    'user/logout' => 'user/logout',    //выход

    'cabinet/edit' => 'cabinet/edit',  //редактировать профиль
    'cabinet' => 'cabinet/index',     //Личный кабинет
    'user/history' => 'cabinet/history',


    'admin/product/create' => 'adminProduct/create',   //Создать товар
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1', //Обновить товар
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1', //Удалить товар
    'admin/product' => 'adminProduct/index', //список всех продуктов

    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1', // редактировать заказ
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1', // удалить заказ
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1', // просмотреть заказы
    'admin/order' => 'adminOrder/index',

    'admin' => 'admin/index', //панель администратора

    '' => 'site/index', // главная страница
);
