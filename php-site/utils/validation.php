<?php

require_once  __DIR__ . "/../error/ApiError.php";

const VALIDATION_EMAIL_PATTERN = '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i';
const VALIDATION_PASSWORD_PATTERN = '/^(?=.*[A-Za-z])(?=.*\d).{8,}$/';

function validation_fail($message)
{
    throw new ApiError(400, $message);
}

function validate_username()
{
    $username = trim($_POST["username"] ?? "");

    if ($username === '') {
        validation_fail("Введите username");
    }

    return $username;
}

function validate_email()
{
    $email = trim($_POST["email"] ?? "");

    if ($email === '') {
        validation_fail("Введите email");
    }

    if (!preg_match(VALIDATION_EMAIL_PATTERN, $email)) {
        validation_fail("Некорректный email");
    }

    return $email;
}

function validate_password()
{
    $password = $_POST["password"] ?? "";

    if ($password === '' || trim($password) === '') {
        validation_fail("Введите пароль");
    }

    if (!preg_match(VALIDATION_PASSWORD_PATTERN, $password)) {
        validation_fail("Минимум 8 символов, нужна буква и цифра");
    }

    return $password;
}
