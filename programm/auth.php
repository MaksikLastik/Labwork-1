<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Вход в систему</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form action="sign_in.php" method="post">
            <div class="login">
                <div class="login-screen">
                    <div class="app-title">
                        <h1>Вход</h1>
                    </div>
                    <div class="login-form">
                        <div class="control-group">
                            <input type="text" name="login" class="login-field" placeholder="Логин">
                        </div>
                        <div class="control-group">
                            <input type="password" name="password" class="login-field" placeholder="Пароль">
                        </div>
                        <button type="submit" class="btn btn-primary btn-large btn-block">Войти</button>
                        <a class="login-link" href="/index.php">Зарегистрироваться</a>
                    </div>
                </div>
                <?php 
                    if ($_SESSION['message']) {
                        echo '<p class="error-page">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                ?>
            </div>        
        </form>
    </body>

</html>