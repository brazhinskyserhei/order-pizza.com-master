<?php

class CartController
{
    public function actionAdd($id)
    {
        // Добавляем товар в корзину
        Cart::addProductInCart($id);
        // Возвращаем пользователя на страницу на которой он был
        //Узнаем адрес страницы с которой пришел пользователь
        $referrer = $_SERVER['HTTP_REFERER'];
        //Перенаправляем пользователя обратно
        header("Location: $referrer");
    }

    public function actionDelete($id)
    {
        // Удалить товар из корзины
        Cart::deleteProductsInCart($id);
        // Возвращаем пользователя на страницу
        header("Location: /cart/");
    }

    public function actionAddAjax($id)
    {
        // Добавляем товар в корзину
        echo Cart::addProductInCart($id);
        return true;
    }

    //Информация о товарах в корзину
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        // Получим данные из корзины
        $productsInCart = Cart::getProductsFromCard();

        if ($productsInCart) {
            // Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }


    public function actionCheckout()
    {
        // Список категорий для левого меню
        $categories = array();
        $categories = Category::getCategoriesList();

        // Статус успешного оформления заказа
        $result = false;
        if (isset($_POST['submitOrder'])) {

            $userName = $_POST['inputNameRegister'];
            $userPhone = $_POST['inputTel1'];
            $userComment = $_POST['comment'];
            // Валидация полей
            $errors = false;
            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';
            if ($errors == false) {

                $productsInCart = Cart::getProductsFromCard();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }
                // Сохраняем заказ в БД
                $result = Order::saveOrder($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    Cart::clearCard();
                }
            }
            else
            {
                $productsInCart = Cart::getProductsFromCard();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProdustsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countProductsInCard();
            }
        } else {
            $productsInCart = Cart::getProductsFromCard();
            if ($productsInCart == false) {
                header("Location: /");
            }
            else
                {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProdustsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countProductsInCard();
                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (User::isGuest()) {
                }
                else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }
        }

        //Выводм стоимость на странице
        $productsInCart = false;
        $productsInCart = Cart::getProductsFromCard();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}