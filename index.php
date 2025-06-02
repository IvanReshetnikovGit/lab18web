<!DOCTYPE html>
<html lang="uk" xml:lang="uk">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Лабораторна робота 18 (Варіант 9)</title>
    </head>
    <body>
        <form action="index.php" method="post" name="form1">
            <h2>Введіть ваші дані:</h2>
            <table>
                <tr>
                    <td>Прізвище:</td>
                    <td><input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>"></td>
                </tr>
                <tr>
                    <td>Ім'я:</td>
                    <td><input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>"></td>
                </tr>
                <tr>
                    <td>Група:</td>
                    <td><input type="text" name="group" value="<?php if(isset($_POST['group'])) echo $_POST['group']; ?>"></td>
                </tr>
                <tr>
                    <td>x:</td>
                    <td><input type="text" name="x" value="<?php if(isset($_POST['x'])) echo $_POST['x']; ?>"></td>
                </tr>
                <tr>
                    <td>y:</td>
                    <td><input type="text" name="y" value="<?php if(isset($_POST['y'])) echo $_POST['y']; ?>"></td>
                </tr>
                <tr>
                    <td>z:</td>
                    <td><input type="text" name="z" value="<?php if(isset($_POST['z'])) echo $_POST['z']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                    <td><input type="hidden" name="confirm" value="1"></td>
                    <td><input type="submit" value="Обчислити"></td>
                </tr>
            </table>
        </form>
    </body>
    <?php
function calculateFunction($x, $y, $z) {
    return ($x+$y+$z);
}

if (isset($_POST['confirm'])) {
    $error = "Помилка: ";
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $group = $_POST['group'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    $variant = 9;
    
    if (empty($lastname)){ $error .= "Не введено прізвище<br>";}
    if (empty($firstname)){ $error .= "Не введено ім'я<br>";}
    if (empty($group)){ $error .= "Не введено групу<br>";}
    if (empty($x)){ $error .= "Не введено x<br>";}
    if (empty($y)){ $error .= "Не введено y<br>";}
    if (empty($z)){ $error .= "Не введено z<br>";}
    
    if ($error != "Помилка: ") {
        echo $error;
    } else {
        
        $result = calculateFunction($x, $y, $z);
        
        echo "<h3>Результати:</h3>";
        echo "<table border='1'>";
        echo "<tr><td>Прізвище:</td><td>$lastname</td></tr>";
        echo "<tr><td>Ім'я:</td><td>$firstname</td></tr>";
        echo "<tr><td>Група:</td><td>$group</td></tr>";
        echo "<tr><td>Номер варіанту:</td><td>$variant</td></tr>";
        echo "<tr><td>X1:</td><td>$x</td></tr>";
        echo "<tr><td>Y1:</td><td>$y</td></tr>";
        echo "<tr><td>Z1:</td><td>$z</td></tr>";
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
            X1 = $x
            Y1 = $y
            Z1 = $z
            
            Результат обчислення функції: $result
        ";
        $headers = "From: naruto.ivanr@gmail.com\r\nReply-To: naruto.ivanr@gmail.com\r\nX-Mailer: PHP/" . phpversion();

        if (!mail($to, $subject, $message, $headers)) {
            echo "<p>Помилка при відправці email.</p>";
        }
    }
}
    ?>
</html>
