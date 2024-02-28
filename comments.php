<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все комментарии</title>
</head>

<body>
    <?php
    include 'connect.php';
    $result = $mysqli->query("SELECT * FROM `comment`;");
    foreach ($result as $rows) { ?>
        <div class="forma" style="border: green 2px solid;">
            <div class="info">
                <div class="img" >
                    <?php echo $rows['img'] . '<br>'; ?>
                </div>
                <div class="login"><?php echo $rows['login'] . '<br>'; ?></div>
            </div>
            <div class="comm">
                <div class="date"><?php echo  $rows['date'] . '<br>'; ?></div>
                <div class="text"><span><?php echo $rows['text'] . '<br>'; ?><span></div>
            </div>
        </div>
    <?php echo '<br>';
    }
    $mysqli->close();
    ?>
    <a href="index.php"> На главную</a>
</body>

</html>