<?php
    session_start();
    require_once 'connect.php';
    
    if (!$_SESSION['user']) {
        header('Location: auth.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Вы вошли в аккаунт</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
        <form>
            <h2>Здравствуйте, <?php echo $_SESSION['user']['full_name'] ?></h2>
            <a href="logout.php">Выход</a>
        </form>
    </body>

</html>