<?php
$valid_username = 'admin';
$valid_password = 'password123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $errors = [];

    if (empty($username)) {
        $errors[] = 'Имя пользователя обязательно';
    } elseif (strlen($username) < 4) {
        $errors[] = 'Имя пользователя должно содержать минимум 4 символа';
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен";
    }
    
    if (empty($errors)) {
        $username = htmlspecialchars($username);
        
        if ($username === $valid_username && $password === $valid_password) {
            echo '<h1>Вход выполнен успешно!</h1>';
            echo "<p>Добро пожаловать, {$username}!</p>";
        } else {
            echo "<p style='color: red;'>Неверное имя пользователя или пароль</p>";
            echo '<p><a href="login.html">Попробовать снова</a></p>';
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>{$error}</p>";
        }
        echo '<p><a href="login.html">Попробовать снова</a></p>';
    }
}
?>