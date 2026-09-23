<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/index.css">
    <title>Phomance</title>
</head>

<body>
    <div class="wrapper">

        <header class="header">
            <button class="open-btn closed">
                <img src="/assets/images/icons/arrows-rotate_97689.svg" alt="открыть">
            </button>
            <ul class="header__nav">
                <li class="header__nav-item">Главная</li>
                <li class="header__nav-item">Галлерея</li>
                <li class="header__nav-item">Вход</li>
                <li class="header__nav-item">Регистрация</li>
            </ul>
        </header>

        <section class="login">
            <div class="login__inner">
                <div class="login__form">
                    <div class="login__logo">
                        <p class="login__logo-item">Phomance</p>
                    </div>

                    <form class="form" action="/" method="post">
                        <div class="form__header">
                            <p class="form__header-tittle">Вход в аккаунт</p>
                        </div>
                        <div class="form__block">
                            <div class="label">Username</div>
                            <div class="input">
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    placeholder="super_name123"
                                    required>
                            </div>
                            <span class="form__error"></span>
                        </div>
                        <div class="form__block">
                            <div class="label">Password</div>
                            <div class="input">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required>
                            </div>
                            <span class="form__error"></span>
                        </div>
                        <label class="checkbox">
                            <input type="checkbox" class="checkbox__input">
                            <span class="checkbox__text">Запомнить меня</span>
                        </label>
                        <button type="submit" class="login__form-button">Войти</button>
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

        <script src="/assets/js/header.js"></script>

    </div>
</body>

</html>