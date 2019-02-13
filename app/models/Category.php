<?php


class Category
{

    public static function getCategoriesList()
    {
        $db = DateBase::getConnectionDB();
        $categoryList = array();
        $result = $db->query('SELECT id, name, simvol FROM category ');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['simvol'] = $row['simvol'];
            $i++;
        }

        return $categoryList;
    }


    //Возвращает массив категорий
    public static function getCategoriesListAdmin()
    {
        $db = DateBase::getConnectionDB();
        $result = $db->query('SELECT id, name, status FROM category');
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

}