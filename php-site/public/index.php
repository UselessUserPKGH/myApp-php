<?php

require __DIR__ . "/../controllers/UserController.php";

$userController = new UserController();

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

switch ($uri) {
    case '':
        $userController->registr();
        break;
    case 'user':
        $userController->showUser();
        break;
    case 'login':
        $userController->login();
        break;
    default:
        http_response_code(404);
        echo '404';
}
