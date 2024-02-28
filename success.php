<?php
 session_start();
 echo "Пользователь аворизован как" .$_SESSION["login"];
 echo '<a href="index.php">На главную</a>'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ура! У вас получилось!</h1>
</body>
</html>