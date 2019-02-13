<?php
class UserController
{

    public function actionRegister()
    {

        //Инициализируем переменные пустыми значениями чтобы избежать ошибок
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        //Проверка на сушествование
        if (isset($_POST['submitRegister'])) {


            $name = $_POST['inputNameRegister'];
            $email = $_POST['inputEmailRegister'];
            $password = md5($_POST['inputPasswordRegister']);

            //Проверка
            /*if (isset($name)) {
                echo '<br/>name:' . $name;
            }

            if (isset($email)) {
                echo '<br/>email:' . $email;
            }

            if (isset($password)) {
                echo '<br/>password:' . $password;
            }*/

            //Хранит ошибки если данные введены неверно
            $errors = false;

            //Проверка на правильность написания
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            //Регистрация пользователя
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }

        }


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


        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    //Авторизация пользователя
    public function actionLogin()
    {
        $email = '';
        $password = '';

        //Проверка
        if (isset($_POST['submitRegister'])) {
            $email = $_POST['inputEmailRegister'];
            $password = md5($_POST['inputPasswordRegister']);

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
            }

        }

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

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

     //Удаляем данные о пользователе из сессии
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }





}
