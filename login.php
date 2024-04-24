<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Качан Егор Юрьевич</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container"></div>
        <div class="row">
            <div class="col-12">
                <h1 class="Reg">Вернись в наши ряды!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="login.php" method="POST">
                    <div class="row form_reg"><input class="form1" type="text" name="login" placeholder="Как тя звать смельчак"></div>
                    <div class="row form_reg"><input class="form1" type="password" name="password" placeholder="Твоя самая большая тайна)"></div>
                    <div class="btn_reg"><button type="submit" id="btn_red" name="submit">Давай жми уже быстрей</button></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once('db.php');

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'Web3');

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (!$username || !$password) die ('Так мы не поймем кто ты, заполни все поля!)');

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($link, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $username, time()+7200);
        header('Location: profile.php');
    } else {
        echo "не правильное имя или пароль";
    }
}
?>
