<?php

class UserService
{
    private function createConnect()
    {
        $connective = mysqli_connect("localhost", "belchenko_phpSite", "Admin12345*", "belchenko_phpSite");
        if (!$connective) {
            die("Ошибка: " . mysqli_connect_error());
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
        $username = mysqli_real_escape_string($this->db, $username);
        $email = mysqli_real_escape_string($this->db, $email);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user(username, email, password) 
            VALUES ('$username', '$email', '$passwordHash')";

        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die("Ошибка: " . mysqli_error($this->db));
        }

        $id = mysqli_insert_id($this->db);

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
            die("Ошибка: " . mysqli_error($this->db));
        }

        return mysqli_fetch_assoc($result);
    }
}
