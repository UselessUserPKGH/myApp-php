<?php
require_once __DIR__ . "/../error/ApiError.php";

class UserService
{
    private function createConnect()
    {
        $connective = mysqli_connect("localhost", "belchenko_phpSite", "Admin12345*", "belchenko_phpSite");
        if (!$connective) {
            throw new ApiError(500, 'ошибка подключения к базе данных');
        }
        mysqli_set_charset($connective, "utf8");
        return $connective;
    }

    private $db;

    public function __construct()
    {
        $this->db = $this->createConnect();
    }

    public function createUser($username, $email, $password): array
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user(username, email, password) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($this->db, $query);
        if (!$stmt) {
            throw new ApiError(500, mysqli_error($this->db));
        }

        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            throw new ApiError(500, $error);
        }

        $id = mysqli_stmt_insert_id($stmt);

        mysqli_stmt_close($stmt);

        return [
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash
        ];
    }

    public function findById($id)
    {
        $query = "SELECT id, username, password, email FROM user WHERE id = " . (int)$id;

        $result = mysqli_query($this->db, $query);

        if (!$result) {
            throw new ApiError(500, mysqli_error($this->db));
        }

        return mysqli_fetch_assoc($result);
    }
}
