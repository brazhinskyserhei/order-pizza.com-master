<?php
class User
{
    //Модель для работы с данными для регистрации
    public static function register($name, $email, $password) {

        $db = DateBase::getConnectionDB();

        $sql = 'INSERT INTO user (name, email, password) '
            . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function checkName($name) {
        if (strlen($name) >= 5) {
            return true;
        }
        return false;
    }


    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 12) {
            return true;
        }
        return false;
    }


    public static function checkPassword($password) {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }


    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    //Провека на дублирование, при регистрации есть ли такое мыло
    public static function checkEmailExists($email) {

        $db = DateBase::getConnectionDB();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }


    //Авторизация

    public static function checkUserData($email, $password)
    {
        $db = DateBase::getConnectionDB();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);

        //Подставляем параметры чтобы избежать иньекций
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        //если пользователь существует возвращает его индентификатор
        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }


     //Запоминаем пользователя
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }


    //Проверка авторизирован ли пользователь
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        //в противном случае перебрасываем пользователя на страницу входа
        header("Location: /user/login");
    }


    //Определяем гость на сайте или нет
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


    //Возвращаем пользователя по идентификатору
    public static function getUserById($id)
    {
        if ($id) {
            $db = DateBase::getConnectionDB();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    //Редактирование данных пользователя

    public static function edit($id, $name, $password)
    {
        $db = DateBase::getConnectionDB();

        $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}