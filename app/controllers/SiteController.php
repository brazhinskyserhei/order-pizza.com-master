<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
class SiteController
{

    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();
        $newProducts = array();
        $newProducts = Product::getNewProducts(6);
        // Рекомендуемые товары с акцией
        $actionProducts = Product::getActionProducts();
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

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

}
