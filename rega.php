<?php
include 'connect.php';
$error_message = "";
if (isset($_POST["send"])) {
    if ($_POST["login"] && $_POST["pass"] && $_POST["pass2"] && $_POST["email"] && $_POST["date_r"]) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            if ($_POST["pass"] == $_POST['pass2']) {
                $login = $_POST["login"];
                $query = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login';");
                if (mysqli_num_rows($query) == 0) {
                    $email = $_POST['email'];
                    $query2 = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email';");
                    if (mysqli_num_rows($query2) == 0) {
                        $password = $_POST['pass'];
                        $date_r = $_POST['date_r'];
                        $result = $mysqli->query("INSERT INTO `users` (`login`, `pass`, `email`, `date_r`)
                        VALUES ('$login',  md5('$password'), '$email', '$date_r');");
                        header("location: index.php");
                    } else echo $error_message = "Данная почта уже зареганы";
                } else echo $error_message = "Данный логин уже зареганы";
            } else echo $error_message = "Пароли не совпадают";
        } else echo $error_message = "Формат эл. почты указан неверно";
    } else echo $error_message = "Не все поля заполнены";
}
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>

<body>
    <div style="border: 3px solid black; padding:1rem">
        <formset>
            <legend>Форма регистрации</legend>
            <form action="" method="POST">
                <label for="">Введите логин</label><input type="text" name="login" placeholder="login"><br>
                <label for="">Введите пароль</label><input type="password" name="pass" placeholder="*****"><br>
                <label for="">Повторите пароль</label><input type="password" name="pass2" placeholder="*****"><br>
                <label for="">Введите почту</label><input type="email" name="email" placeholder="test@test.ru"><br>
                <label for="">Введите дату рождения</label><input type="date" name="date_r" placeholder="2000-01-01"><br>
                <input type="submit" name="send" value="Отправить">
                <a href="index.php"> На главную</a>
            </form>
        </formset>
    </div>
</body>

</html>