<?php

namespace Controllers;

use Models\User;

   class UserController
  {
     public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST['User_id'];
            $password = $_POST['Password'];

            $user = User::authenticate($user_id, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['User_id'];
                header('Location: index.php');
                exit();
            } else {
                $error = "Invalid user ID or password.";
            }
        }
        include __DIR__ . '/../Views/login.php';
    }

    public function register()
     {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST['User_id'];
            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $password = $_POST['Password'];

            $userExists = User::getUserByEmail($email);
            if ($userExists) {
                $error = "Email already registered. Please login.";
            } else {
                $registerResult = User::register($user_id,$name, $email, $password);
                if ($registerResult) {
                    header('Location: login.php');
                    exit();
                } else {
                    $error = "Error registering user.";
                }
            }
        }
        include __DIR__ . '/../Views/register.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
?>
