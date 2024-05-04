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
    <div class="container nav_bar">
        <div class="row">
            <div class="col-2 nav_logo"></div>
            <div class="col-10">
                <div class="nav_text">Коротко обо мне!</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Качан Егор - ныне студент 2ого курса Компьютерной безопасности. Пока что очень нравится учится и я
                    всему
                    рад, oсобенно появлению web'a. И Я ЛЮБЛЮ АНИМЕ, но из-за учебы времени на него все меньше и
                    меньше(((((.
                </h2>
            </div>
            <div class="col-4">
                <div class="row my_photo"></div>
                <div class="row">
                    <p class="title_photo">Это типа я в будущем</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class=" button_js col-12">
                <button id="myButton">Фулл Чабика</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Рады что ты, <?php echo $_COOKIE['User']; ?> вернулся!
                </h1>
            </div>
            <div class="col-12">
                <form action="profile.php" method="POST" enctype="multipart/form-data" name="upload">
                    <div class="form_profile"><input type="text" class="form" name="title" placeholder="Тему не забудь"></div>
                    <div class="text_profile"><textarea class="text" name="text" cols="30" rows="10" placeholder="Записывай все свои грязные мыслишки..."></textarea></div>
                    <div class="hello"><input type="file" name="file" /><br></div>
                    <div class="btn_reg"><button tupe="submit" id="btn_red" name="submit">Сохрани их!</button></div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>

</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'Web3');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля мальчик");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Твой пост г..но");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}

?>