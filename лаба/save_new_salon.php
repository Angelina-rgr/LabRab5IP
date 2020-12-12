<?php
 // Подключение к базе данных:
 $link = mysqli_connect("localhost", "f0478659_root", "123","f0478659_cars");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}
 $sql_add = "INSERT INTO autosalon SET name_salon='" . $_GET['name_salon']
."', address='".$_GET['address']."'";
 mysqli_query($link,$sql_add); // Выполнение запроса
  print "<p>Спасибо, салон добавлен.";
 print "<p><a href=\"index.php\"> Вернуться к списку
таблиц</a>"; 
?>