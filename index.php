<?php
function calculateFunction($x, $y, $z) {
    return (2 * cos(pow($x, 0.1) - pi() / 6)) / (($y / $x) + pow(sin(pow($y, 0.3)), 2)) + pow(log($z), 2 * 0.3);
}

if (isset($_POST['confirm'])) {
    $error = "Помилка: ";
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $group = $_POST['group'];
    $variant = 9;
    
    if (empty($lastname)){ $error .= "Не введено прізвище<br>";}
    if (empty($firstname)){ $error .= "Не введено ім'я<br>";}
    if (empty($group)){ $error .= "Не введено групу<br>";}
    if (empty($variant)){ $error .= "Не введено номер варіанту<br>";}
    
    if ($error != "Помилка: ") {
        echo $error;
    } else {
        $x1 = 1.23 * $variant;
        $y1 = 4.6 * $variant;
        $z1 = 36.6 / $variant;
        
        $result = calculateFunction($x1, $y1, $z1);
        
        echo "<h3>Результати:</h3>";
        echo "<table border='1'>";
        echo "<tr><td>Прізвище:</td><td>$lastname</td></tr>";
        echo "<tr><td>Ім'я:</td><td>$firstname</td></tr>";
        echo "<tr><td>Група:</td><td>$group</td></tr>";
        echo "<tr><td>Номер варіанту:</td><td>$variant</td></tr>";
        echo "<tr><td>X1:</td><td>$x1</td></tr>";
        echo "<tr><td>Y1:</td><td>$y1</td></tr>";
        echo "<tr><td>Z1:</td><td>$z1</td></tr>";
        echo "<tr><td>Результат функції:</td><td>$result</td></tr>";
        echo "</table>";
        
        $to = "naruto.ivanr@gmail.com";
        $subject = "Результати лабораторної роботи 18 (Варіант $variant)";
        $message = "
            Прізвище: $lastname
            Ім'я: $firstname
            Група: $group
            Номер варіанту: $variant
            
            Вхідні дані:
            X1 = $x1
            Y1 = $y1
            Z1 = $z1
            
            Результат обчислення функції: $result
        ";
        $headers = "From: webmaster@example.com";
        
        if (mail($to, $subject, $message, $headers)) {
            echo "<p>Результати успішно відправлені на вашу електронну адресу.</p>";
        } else {
            echo "<p>Помилка при відправці email.</p>";
        }
    }
}
