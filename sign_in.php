<?php
    session_start();
    require_once 'connect.php';
    
    $login = $_POST['login'];
    $password = md5($_POST['password'] . $login);

    if (!empty($login) && !empty($password)) {
        $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        $check_password = mysqli_query($connect, "SELECT * FROM `users` WHERE`password` = '$password'");
        if (mysqli_num_rows($check_login) > 0) {
            if (mysqli_num_rows($check_password) > 0) {
                $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
                $user = mysqli_fetch_assoc($check_user);

                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "full_name" => $user['full_name']
                ];

                header('Location: profile.php');
            } else {
                $_SESSION['message'] = 'Неверный логин или пароль';
            header('Location: auth.php');
            }
        } else {
            $_SESSION['message'] = 'Такого пользователя не существует';
            header('Location: auth.php');
        }
    } else {
        $_SESSION['message'] = 'Не все поля были заполнены';
        header('Location: auth.php');
    }

?>