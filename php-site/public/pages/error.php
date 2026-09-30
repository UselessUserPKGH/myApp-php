<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка</title>
    <link rel="stylesheet" href="/assets/css/index.css">
</head>

<body>
    <div class="wrapper">
        <section class="error">
            <div class="error__inner">
                <div class="error_status">Код ошибки: <?= htmlspecialchars((string)$status, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></div>
                <div class="error_message"><?= htmlspecialchars((string)$message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></div>
            </div>
        </section>
    </div>
</body>

</html>
