<?php

require __DIR__ . "/../service/UserService.php";
require __DIR__ . "/../utils/validation.php";

class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function registr()
    {
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
    }

    public function showUser()
    {
        $id = (int)($_GET["id"] ?? 0);

        $user = $this->userService->findById($id);

        require __DIR__ . "/../public/pages/user.php";
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            require __DIR__ . "/../public/pages/login.php";
        }
    }
}
