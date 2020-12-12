<html>
<title> Шарафиева Ксения </title>

<body style=" background-color:#FFFFCC">
<?php
 $link = mysqli_connect("localhost", "f0478659_root", "123","f0478659_cars");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}
 $rows=mysqli_query($link,"SELECT id_car,id_salon, cost FROM auto_nalich WHERE
 id='".$_GET['id']."'",$db);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $id_car = $st['id_car'];
 $id_salon = $st['id_salon'];
$cost = $st['cost'];
 }
print "<form action='save_edit_nalich.php' metod='get'>";
print "Машина: <input name='id_car' size='50' type='text'
value='".$id_car."'>";
print "<br>Салон: <input name='id_salon' size='20' type='text'
value='".$id_salon."'>";
print "<br>Цена: <input name='cost' size='30' type='text'
value='".$cost."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
машин </a>";
?>
</body>
</html>