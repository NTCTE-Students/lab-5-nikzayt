<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    $errors = [];

    if (empty($username)) {
        $errors[] = 'Имя пользователя обязательно';
    } elseif (strlen($username) < 4) {
        $errors[] = 'Имя пользователя должно содержать минимум 4 символа';
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен";
    } elseif (strlen($password) < 6) {
        $errors[] = "Пароль должен содержать минимум 6 символов";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Пароли не совпадают";
    }
    
    if (empty($errors)) {
        $username = htmlspecialchars($username);
        
        echo '<h1>Регистрация успешна</h1>';
        echo "Имя пользователя: {$username}<br>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>{$error}</p>";
        }
        echo '<p><a href="register.html">Попробовать снова</a></p>';
    }
}
?>