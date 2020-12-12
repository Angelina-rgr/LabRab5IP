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
 $rows=mysqli_query($link,"SELECT name, model, year, trans, value, cost FROM mashina WHERE
 id_car='".$_GET['id']."'",$db);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $name = $st['name'];
 $model = $st['model'];
 $year = $st['year'];
 $trans = $st['trans'];
 $value = $st['value'];
$cost = $st['cost'];
 }
print "<form action='save_edit.php' metod='get'>";
print "Марка: <input name='name' size='50' type='text'
value='".$name."'>";
print "<br>Модель: <input name='model' size='20' type='text'
value='".$model."'>";
print "<br>Год выпуска: <input name='year' size='20' type='text'
value='".$year."'>";
print "<br>Трансмиссия: <input name='trans' size='30' type='text'
value='".$trans."'>";
print "<br>Объем выпуска: <input name='value' size='30' type='text'
value='".$value."'>";
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