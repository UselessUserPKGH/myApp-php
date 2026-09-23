<?php

require __DIR__ . "/../service/UserService.php";

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
            $email = $_POST["email"] ?? "";
            $password = $_POST["password"] ?? "";
            $username = $_POST["username"] ?? "";

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

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            require __DIR__ . "/../public/pages/login.php";
        }
    }
}
