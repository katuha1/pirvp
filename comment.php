<?php
include 'connect.php';
$error_message = "";
if (isset($_POST["send"])) {
    if ($_POST["login"] && $_POST["text"]) {
        $login = $_POST["login"];
        $img = $_POST["img"];
        $text = $_POST["text"];
        $result = $mysqli->query("INSERT INTO `comment` (`login`, `img`, `text`)
            VALUES ('$login', '$img', '$text');");
            header("location: comments.php");
    } else echo $error_message = "Не все поля заполнены";
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание Комментария</title>
</head>

<body>
    <div style="border: 3px solid black; padding:1rem">
        <formset>
            <legend>Создание комментариев</legend>
            <form action="" method="POST">
                <label for="">Введите логин</label><input type="text" name="login" placeholder="login"><br>
                <input type="file" name="img" placeholder="выберите файл"><br>
                <textarea name="text" name="text" cols="30" rows="10" placeholder="Введите текст"></textarea> <br>
                <input type="submit" name="send" value="Создать">
                <a href="index.php"> На главную</a>
            </form>
        </formset>
    </div>
</body>

</html>