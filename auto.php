<?php
session_start();
include 'connect.php';

$error_message = "";
if (isset($_POST["send"])) {
    $_SESSION["login"] = $_POST["login"];
    if (!empty($_POST["login"]) && !empty($_POST["pass"])) {
        $login = $_POST["login"];
        $query = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login';");
        if (mysqli_num_rows($query) == 1) {
            $pass = $_POST["pass"];
            $row = mysqli_fetch_assoc($query);
            if (md5("$pass") == $row["pass"]) {
                header("location: success.php?send = 1");
            } else echo $error_message = "Пароль неверный";
        } else echo $error_message = "Пользователь не сущ";
    } else echo $error_message = "Поля не заполнены";
}

$mysqli->close()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>

<body>
    <div style="border: 3px solid black; padding:1rem">


        <formset>

            <legend>Форма авторизации</legend>
            <form action="" method="POST">
                <label for="">Введите логин</label><input type="text" name="login" placeholder="login" require><br>
                <label for="">Введите пароль</label><input type="password" name="pass" placeholder="*****" require><br>
                <input type="submit" name="send" value="Войти">
                <a href="index.php"> На главную</a>
                <a href="rega.php">Зарегестрироваться</a>
            </form>

        </formset>
    </div>
</body>

</html>