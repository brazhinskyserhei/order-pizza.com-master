<?php

class AdminProductController extends AdminBase
{
    // "Управление товарами"
    public function actionIndex()
    {
        self::checkAdminOrNot();
        $productsList = Product::getProductsList();
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }

    //"Удалить товар"
    public function actionDelete($id)
    {
        self::checkAdminOrNot();
        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

     // "Добавить товар"
    public function actionCreate()
    {
        self::checkAdminOrNot();
        $categoriesList = Category::getCategoriesListAdmin();
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['avalability'] = $_POST['avalability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recomendation'] = $_POST['is_recomendation'];
            $options['is_action'] = $_POST['is_action'];
            $options['status'] = $_POST['status'];
            $errors = false;
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                $id = Product::createProduct($options);
                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/{$id}.jpg");
                    }
                };
                header("Location: /admin/product");
            }
        }
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    // "Редактировать товар"
    public function actionUpdate($id)
    {
        self::checkAdminOrNot();
        $categoriesList = Category::getCategoriesListAdmin();
        $product = Product::getProductById($id);

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['is_action'] = $_POST['is_action'];
            $options['avalability'] = $_POST['avalability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recomendation'] = $_POST['is_recomendation'];
            $options['status'] = $_POST['status'];

            if (Product::updateProductById($id, $options)) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/{$id}.jpg");
                }
            }
            header("Location: /admin/product");
        }
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }
}