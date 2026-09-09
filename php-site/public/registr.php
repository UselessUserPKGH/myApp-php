<?php

$email = $_POST["email"];
$password = $_POST["password"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="wrapper">
        <div class="registr_data">

            <div class="user__data">
                <h3 class="user__data-title">Данные пользователя</h3>
                <ul class="user__data-list">
                    <li class="user__data-item">
                        <div class="key">Email:</div>
                        <div class="value"><?= $email ?></div>
                    </li>
                    <li class="user__data-item">
                        <div class="key">Password:</div>
                        <div class="value"><?= $password ?></div>
                    </li>
                </ul>
            </div>

            <div class="server__data">
                <h3 class="server__data-title">Данные сервера</h3>
                <ul class="server__data-list">
                    <?php foreach ($_SERVER as $key => $value): ?>
                        <li class="server__data-item">
                            <div class="key"><?= htmlspecialchars($key) ?>:</div>
                            <div class="value"><?= htmlspecialchars($value) ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>