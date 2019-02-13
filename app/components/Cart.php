<?php
class Cart
{
    //Добавление товара в корзину (сессию)
    public static function addProductInCart($id)
    {
        //Получение идентификатора выбранного товара
        $id = intval($id);

        // Пустой массив для товаров в корзине
        //Товары будем хранить в виде
       /* [номер товара]=[количество]*/

        $productsInCart = array();

        if ((isset($_SESSION['products']))) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        }

        else {
            $productsInCart[$id] = 1;
        }
        $_SESSION['products'] = $productsInCart;
        return self::countProductsInCard();
    }


    //Подсчет количество товаров в корзине (в сессии)
    public static function countProductsInCard()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
                return $count;
        }
        else {
            return 0;
        }
    }

    //Вернем все продукты из сессии
    public static function getProductsFromCard()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    //Подсчитаем сумму товаров в корзине
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProductsFromCard();
        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    //Очищение корзины
    public static function clearCard()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    //Удаление товара из корзины
    public static function deleteProductsInCart($id)
    {
        $productsInCart = self::getProductsFromCard();
        if($productsInCart[$id]<=1){
            unset($productsInCart[$id]);
        }
        else{
            $productsInCart[$id]--;
        }
        $_SESSION['products'] = $productsInCart;
    }
}