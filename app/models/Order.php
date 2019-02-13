<?php

class Order
{

    //Сохранение заказа в БД
    public static function saveOrder($userName, $userPhone, $userComment, $userId, $products)
    {
        $products = json_encode($products);

        $db = DateBase::getConnectionDB();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    //Метод возвращает список заказов
    public static function getOrdersList()
    {
        $db = DateBase::getConnectionDB();

        $result = $db->query('SELECT id, user_name, user_phone, с_date FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['с_date'] = $row['с_date'];
            $i++;
        }
        return $ordersList;
    }

    //Метод возвращает заказ по идентификатору

    public static function getOrderById($id)
    {
        $db = DateBase::getConnectionDB();
        $sql = 'SELECT * FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    //Метод для обновления данных о заказе
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $c_date)
    {
        $db = DateBase::getConnectionDB();
        $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                c_date = :c_date, 
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':c_date', $c_date, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function deleteOrderById($id)
    {
        $db = DateBase::getConnectionDB();
        $sql = 'DELETE FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    //История покупок
    public static function getOrdersByIdUser($id)
    {
        $db = DateBase::getConnectionDB();

        $result = $db->query('SELECT id,user_name,user_phone,user_comment,с_date FROM product_order WHERE user_id = "'.$id.'"');
        $orders = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['user_name'] = $row['user_name'];
            $orders[$i]['user_phone'] = $row['user_phone'];
            $orders[$i]['user_comment'] = $row['user_comment'];
            $orders[$i]['с_date'] = $row['с_date'];
            $i++;
        }
        return $orders;
    }





}