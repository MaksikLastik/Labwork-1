<?php

    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $password = ($_POST['password']);
    $password_confirm = $_POST['password_confirm'];

    if (!empty($full_name) && !empty($login) && !empty($password) && !empty($password_confirm)) {
        if ($password === $password_confirm) {
            $password = md5($password . $login);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `password`) VALUES (NULL, '$full_name', '$login', '$password')");

            $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
            if (mysqli_num_rows($check_user) == 1) {
                $user = mysqli_fetch_assoc($check_user);
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "full_name" => $user['full_name']
                ];
                header('Location: profile.php');
            } else {
                if (mysqli_num_rows($check_user) > 1) {
                    $_SESSION['message'] = 'Такой пользователь уже существует';
                    header('Location: index.php');
                }
            }
        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: index.php');
        }
    } else {
        $_SESSION['message'] = 'Не все поля не заполнены';
        header('Location: index.php');
    }
?>