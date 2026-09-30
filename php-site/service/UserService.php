<?php
require_once __DIR__ . "/../error/ApiError.php";

class UserService
{
    private function createConnect()
    {
        try {
            $connective = mysqli_connect("localhost", "belchenko_phpSite", "Admin12345*", "belchenko_phpSite");
        } catch (mysqli_sql_exception $e) {
            error_log('db connect: ' . $e->getMessage());

            throw new ApiError(500, 'ошибка подключения к базе данных');
        }

        if (!$connective) {
            error_log('db connect: ' . mysqli_connect_error());

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

    private function usernameExists(string $username): bool
    {
        try {
            $stmt = mysqli_prepare($this->db, "SELECT id FROM user WHERE username = ?");
            if (!$stmt) {
                error_log('db prepare: ' . mysqli_error($this->db));

                throw new ApiError(500, 'ошибка базы данных');
            }

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $exists = mysqli_stmt_num_rows($stmt) > 0;

            mysqli_stmt_close($stmt);
        } catch (mysqli_sql_exception $e) {
            error_log('db select: ' . $e->getMessage());

            throw new ApiError(500, 'ошибка базы данных');
        }

        return $exists;
    }

    public function createUser($username, $email, $password): array
    {
        if ($this->usernameExists($username)) {
            throw new ApiError(409, 'Пользователь с таким username уже существует');
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user(username, email, password) VALUES (?, ?, ?)";

        try {
            $stmt = mysqli_prepare($this->db, $query);
            if (!$stmt) {
                error_log('db prepare: ' . mysqli_error($this->db));

                throw new ApiError(500, 'ошибка базы данных');
            }

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
            mysqli_stmt_execute($stmt);

            $id = mysqli_stmt_insert_id($stmt);

            mysqli_stmt_close($stmt);
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                throw new ApiError(409, 'Пользователь с таким username уже существует');
            }

            error_log('db insert: ' . $e->getMessage());

            throw new ApiError(500, 'ошибка базы данных');
        }

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

        try {
            $result = mysqli_query($this->db, $query);
        } catch (mysqli_sql_exception $e) {
            error_log('db select: ' . $e->getMessage());

            throw new ApiError(500, 'ошибка базы данных');
        }

        if (!$result) {
            error_log('db select: ' . mysqli_error($this->db));

            throw new ApiError(500, 'ошибка базы данных');
        }

        $user = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        return $user;
    }
}
