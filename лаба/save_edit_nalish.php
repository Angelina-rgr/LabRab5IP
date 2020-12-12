<html> <body>
<?php
 $link = mysqli_connect("localhost", "f0478659_root", "123","f0478659_cars");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}
 $zapros="UPDATE auto_nalich SET id_car='".$_GET['id_car']."', id_salon='".$_GET['model']."'
 , cost='".$_GET['cost']."'
 WHERE id='".$_GET['id'].;
 mysqli_query($link,$zapros);
 echo 'Все сохранено. <a href="index.php"> Вернуться к списку
машин</a>'; 

?>
</body> </html>