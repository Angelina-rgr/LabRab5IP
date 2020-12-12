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
 $rows=mysqli_query($link,"SELECT name_salon, address FROM autosalon WHERE
 id_salon='".$_GET['id']."'",$db);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $name_salon = $st['name_salon'];
 $address = $st['address'];
 }
print "<form action='save_edit_salon.php' metod='get'>";
print "Название: <input name='name_salon' size='50' type='text'
value='".$name_salon."'>";
print "<br>Адрес: <input name='address' size='20' type='text'
value='".$address."'>";

print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
машин </a>";
?>
</body>
</html>