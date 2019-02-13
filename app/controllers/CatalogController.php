<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';
class CatalogController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(20);

        $productsInCart = false;
        $productsInCart = Cart::getProductsFromCard();

        if ($productsInCart) {
            // Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    //Выводим товары по номеру категории
    public function actionCategory($categoryId,$page=1)
    {
        /*echo '<br/>'.$page;
        echo '<br/>'.$categoryId;*/
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId,$page);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

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

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }

}
