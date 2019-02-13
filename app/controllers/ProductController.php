<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
class ProductController
{

    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        /* Выводм стоимость на странице*/
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
        $product = Product::getProductById($productId);
        require_once(ROOT . '/views/product/view.php');

        return true;
    }

}