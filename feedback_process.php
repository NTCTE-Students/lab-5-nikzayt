<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    }
    
    if (empty($email)) {
        $errors[] = "Электронная почта обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной почты некорректный формат";
    }
    
    if (empty($message)) {
        $errors[] = "Сообщение обязательно";
    } elseif (strlen($message) < 10) {
        $errors[] = "Сообщение должно содержать минимум 10 символов";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);
        
        echo '<h1>Спасибо за ваше сообщение!</h1>';
        echo "<p>Имя: {$name}</p>";
        echo "<p>Email: {$email}</p>";
        echo "<p>Сообщение: {$message}</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>{$error}</p>";
        }
        echo '<p><a href="feedback.html">Попробовать снова</a></p>';
    }
}
?>