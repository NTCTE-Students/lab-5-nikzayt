<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    
    $errors = [];
    
    if (empty($email)) {
        $errors[] = "Электронная почта обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной почты некорректный формат";
    }
    
    if (empty($errors)) {
        $email = htmlspecialchars($email);
        
        echo '<h1>Спасибо за подписку!</h1>';
        echo "<p>На адрес {$email} будет отправлена рассылка.</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>{$error}</p>";
        }
        echo '<p><a href="subscribe.html">Попробовать снова</a></p>';
    }
}
?>