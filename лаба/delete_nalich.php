<?php
$link = mysqli_connect("localhost", "f0478659_root", "123","f0478659_cars");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}
 $zapros="DELETE FROM auto_nalich WHERE id='".$_GET['id']."'";
 mysqli_query($link,$zapros);
 header("Location: index.php");
 exit;
?>
