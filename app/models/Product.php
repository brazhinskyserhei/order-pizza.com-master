<?php

class Product
{

    //количество товаров, которое необходимо отображать на одной странице (постраничная навигация)
    const SHOW_BY_DEFAULT = 6;

     //Массив последних товаров

    public static function getNewProducts($count = self::SHOW_BY_DEFAULT)
    {
        //Количество товаров, которое мы хотим получить
        //Возвращаем целое значение переменной
        $count = intval($count);
        //Подключаемся к БД
        $db = DateBase::getConnectionDB();
        //Cоздаем массив последних товаров
        $productsList = array();
        //Пишем запрос в БД, вызываем необходимые значения полей
        $result = $db->query('SELECT id, name, price, description, image, is_new FROM product '
            . 'WHERE status = "1" AND is_new = "1"'
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['description'] = $row['description'];
            $i++;
        }
        return $productsList;
    }


    //Вывести последние товары
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = DateBase::getConnectionDB();
        $productsList = array();
        $result = $db->query('SELECT id, name, price, description, image, is_new, is_action FROM product '
            . 'WHERE status = "1"'
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['is_action'] = $row['is_action'];
            $i++;
        }
        return $productsList;
    }


    //Выводим товары по категориям
    public static function getProductsListByCategory($categoryId = false,$page = 1)
    {
        if ($categoryId) {
            $page = intval($page);
            //Вычисление смещения товаров на стрнице
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DateBase::getConnectionDB();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, is_new, description, is_action FROM product "
                . "WHERE status = '1' AND category_id = '$categoryId' "
                . "ORDER BY id ASC "
                . "LIMIT ".self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $products[$i]['is_action'] = $row['is_action'];
                $products[$i]['description'] = $row['description'];
                $i++;
            }
            return $products;
        }
    }

    //Вывести информацию о товаре
    public static function getProductById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = DateBase::getConnectionDB();
            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }


    //количестово проодуктов в категории
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = DateBase::getConnectionDB();
        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1" AND category_id ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    //возвращаем товары
    public static function getProdustsByIds($idsArray)
    {
        $products = array();
        $db = DateBase::getConnectionDB();
        $idsString = implode(',', $idsArray);
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

     // Возвращает товары с акцией
    public static function getActionProducts()
    {
        $db = DateBase::getConnectionDB();
        $result = $db->query('SELECT id, name, price, is_action FROM product '
            . 'WHERE status = "1" AND is_action = "1" '
            . 'ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_action'] = $row['is_action'];
            $i++;
        }
        return $productsList;
    }

     //Возвращает список товаров
    public static function getProductsList()
    {
        $db = DateBase::getConnectionDB();
        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

     //Удаляем товар
    public static function deleteProductById($id)
    {
        $db = DateBase::getConnectionDB();
        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    //Добавиляем новый товар
    public static function createProduct($options)
    {
        $db = DateBase::getConnectionDB();
        $sql = 'INSERT INTO product '
            . '(name, category_id, code, price,'
            . 'avalability, description, is_new, is_recomendation,status,is_action)'
            . 'VALUES '
            . '(:name, :category_id, :code, :price,'
            . ':avalability, :description, :is_new, :is_recomendation,:status,:is_action)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':is_action', $options['is_action'], PDO::PARAM_INT);
        $result->bindParam(':avalability', $options['avalability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recomendation', $options['is_recomendation'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute()) {
            // возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    //Редактируем товар

    public static function updateProductById($id, $options)
    {
        $db = DateBase::getConnectionDB();
        $sql = "UPDATE product
            SET 
                name = :name, 
                category_id = :category_id,
                code = :code, 
                price = :price,  
                avalability = :avalability, 
                description = :description, 
                is_new = :is_new, 
                is_recomendation = :is_recomendation, 
                status = :status,
                is_action =:is_action
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':avalability', $options['avalability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recomendation', $options['is_recomendation'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':is_action', $options['is_action'], PDO::PARAM_INT);
        return $result->execute();
    }

    //Загружаем картинку на сервер
    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/product/';
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}