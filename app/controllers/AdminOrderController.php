<?php

//Контроллер для управления заказами в админпанеле
class AdminOrderController extends AdminBase
{
     //Страница "Управление заказами"
    public function actionIndex()
    {
        self::checkAdminOrNot();
        $ordersList = Order::getOrdersList();
        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

    //Страница"Редактирование заказа"

    public function actionUpdate($id)
    {
        self::checkAdminOrNot();
        $order = Order::getOrderById($id);
        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $с_date = $_POST['с_date'];
            Order::updateOrderById($id, $userName, $userPhone, $userComment, $с_date);
            header("Location: /admin/order/view/$id");
        }
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

     // Страница "Просмотр товаров"
    public function actionView($id)
    {
        self::checkAdminOrNot();
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
        $productsIds = array_keys($productsQuantity);
        $products = Product::getProdustsByIds($productsIds);
        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    }

     //страница "Удалить заказ"
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdminOrNot();
        if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);
            header("Location: /admin/order");
        }
        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }

}
