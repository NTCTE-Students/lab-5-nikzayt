<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    }
    
    if (empty($date)) {
        $errors[] = "Дата бронирования обязательна";
    } else {
        $current_date = date('Y-m-d');
        if ($date < $current_date) {
            $errors[] = "Дата бронирования не может быть в прошлом";
        }
    }
    
    if (empty($time)) {
        $errors[] = "Время бронирования обязательно";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $date = htmlspecialchars($date);
        $time = htmlspecialchars($time);
        
        echo '<h1>Бронирование подтверждено!</h1>';
        echo "<p>Имя: {$name}</p>";
        echo "<p>Дата: {$date}</p>";
        echo "<p>Время: {$time}</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>{$error}</p>";
        }
        echo '<p><a href="booking.html">Попробовать снова</a></p>';
    }
}
?>