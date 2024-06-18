<?php

namespace Models;

require __DIR__ . '/../../config/database.php';

class User
{
    public static function register($user_id,$name, $email, $password )
    {
        global $connection;
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $connection->prepare("INSERT INTO user (User_id, Name,  Email, Password) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $user_id, $name, $email, $hashed_password);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public static function authenticate($user_id, $password)
    {
        global $connection;
        $stmt = $connection->prepare("SELECT User_id, Name,  Email, Password FROM user WHERE User_id = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists and verify password
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                return $user;
            }
        }
        return false;
    }

    public static function getUserByEmail($email)
    {
        global $connection;
        $stmt = $connection->prepare("SELECT User_id, Name,  Email, Password FROM user WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
}
?>
