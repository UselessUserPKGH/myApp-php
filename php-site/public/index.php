<?php

require __DIR__ . "/../controllers/UserController.php";
require_once  __DIR__ . "/../error/ApiError.php";

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

try {
    $userController = new UserController();
    
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
            throw new ApiError(404, 'маршрут не найден');
    }
} catch (Throwable $e) {
    ApiError::handle($e);
}
