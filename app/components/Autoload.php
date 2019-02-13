<?php

//Автозагрузка классов
function __autoload($class_name)
{
    //Ищем класс, если он не был подключен
    $array_paths = array(
        '/models/',
        '/components/'
    );
    //Ищем в папках нужный класс
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path))
        {
            include_once $path;
        }
    }
}