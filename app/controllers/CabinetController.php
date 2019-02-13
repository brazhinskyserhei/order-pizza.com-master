<?php

class CabinetController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();
       /*echo $userId;*/

        $user = User::getUserById($userId);
        $productsInCart = false;

        // Получим данные из корзины
        $productsInCart = Cart::getProductsFromCard();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            // общая стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }


    //Редактируем данные о пользователе
    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $result = false;

        if (isset($_POST['submitRegister'])) {
            $name = $_POST['inputNameRegister'];
            $password = $_POST['inputPasswordRegister'];
            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'Короткое имя';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Короткое имя пароля';
            }
            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        $productsInCart = false;
        $productsInCart = Cart::getProductsFromCard();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }

    //История заказов
    public function actionHistory(){

        $userId = User::checkLogged();
        $orders = Order::getOrdersByIdUser($userId);

        $productsInCart = Cart::getProductsFromCard();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cabinet/history.php');
        return true;
    }
}