<?php

require __DIR__ . "/../service/UserService.php";
require __DIR__ . "/../utils/validation.php";
require_once __DIR__ . "/../error/ApiError.php";

class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function registr()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = validate_username();
                $email = validate_email();
                $password = validate_password();

                $user = $this->userService->createUser($username, $email, $password);

                header("Location: /user?id=" . $user["id"]);
                exit;
            }

            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                require __DIR__ . "/../public/pages/registr.php";
            }
        } catch (Throwable $e) {
            ApiError::handle($e);
        }
    }

    public function showUser()
    {
        try {
            $id = (int)($_GET["id"] ?? 0);

            $user = $this->userService->findById($id);

            require __DIR__ . "/../public/pages/user.php";
        } catch (Throwable $e) {
            ApiError::handle($e);
        }
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            require __DIR__ . "/../public/pages/login.php";
        }
    }
}
