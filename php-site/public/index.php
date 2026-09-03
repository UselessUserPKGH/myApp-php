<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Phomance</title>
</head>

<body>
    <div class="wrapper">

        <header class="header">
            <div class="header__nav">
                <div class="header__nav-item">Главная</div>
                <div class="header__nav-item">Галлерея</div>
            </div>
        </header>

        <section class="login">
            <div class="login__inner">
                <div class="login__form">
                    <div class="login__logo">
                        <p class="login__logo-item">Phomance</p>
                    </div>
                    <form class="form">
                        <div class="form__header">
                            <p class="form__header-tittle">Регистрация</p>
                            <p class="form__header-subtitle">Размещайте свои фотографии, сохраняйте понравившиеся</p>
                        </div>
                        <div class="form__block">
                            <div class="label">Email</div>
                            <input type="email" name="email" placeholder="your@email.com">
                        </div>
                        <div class="form__block">
                            <div class="label">Password</div>
                            <input type="password" name="password" placeholder="">
                        </div>
                        <div class="form__block">
                            <div class="label">Confirm password</div>
                            <input type="password" name="confirm" placeholder="">
                        </div>
                        <label class="checkbox">
                            <input type="checkbox" class="checkbox__input">
                            <span class="checkbox__text">Запомнить меня</span>
                        </label>
                        <button type="submit" class="login__form-button">Войти</button>
                        <p class="forgot__passwod">Забыли пароль?</p>
                    </form>
                </div>
                <div class="login__content">
                    <div class="blur__container">
                        <div class="login__content-text">Development web-site Phomance</div>
                        <div class="login__content-sign">by The Maksim</div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <p>Контактная информация: +7 (435) 412-32-32 </p>
        </footer>

    </div>
</body>

</html>