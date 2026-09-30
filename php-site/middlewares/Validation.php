<?php

class  Validation
{
    public static function validate()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_REGEXP) ?? "";
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? "";
            $password = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_REGEXP) ?? "";
        }
    }
}
