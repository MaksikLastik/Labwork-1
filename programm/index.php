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
        <title>Регистрация</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
        <form action="sign_up.php" method="post" class="login">
            <div class="login">
                <div class="login-screen">
                    <div class="app-title">
                        <h1>Регистрация</h1>
                    </div>
                    <div class="login-form">
                        <div class="control-group">
                            <input type="text" name="full_name" class="login-field" placeholder="ФИО">
                        </div>
                        <div class="control-group">
                            <input type="text" name="login" class="login-field" placeholder="Логин">
                        </div>
                        <div class="control-group">
                            <input type="password" name="password" class="login-field" placeholder="Пароль">
                        </div>
                        <div class="control-group">
                            <input type="password" name="password_confirm" class="login-field" placeholder="Повторите пароль">
                        </div>
                        <button type="submit" class="btn btn-primary btn-large btn-block">Зарегистрироваться</button>
                        <a class="login-link" href="/auth.php">Войти</a>
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