<?php
?>
<html> 
<head> <title>Шарафиева Ксения</title> </head>
<body style=" background-color:#FFFFCC">
   <?php
$link = mysqli_connect("localhost", "f0478659_root", "123","f0478659_cars");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}
?>
<h2>Список машин:</h2>
<table border="1">
<tr> 
<th> Номер </th> <th bgcolor="#ADFF2F"> Марка </th> <th> Модель </th><th bgcolor="#ADFF2F"> Год выпуска </th><th> Трансмиссия </th><th bgcolor="#ADFF2F"> Объем выпуска </th><th> Цена </th>
 <th>  Редактировать </th> <th bgcolor='#DC143C'> Уничтожить </th> </tr>
<?php
$result= mysqli_query($link,"SELECT * FROM mashina");
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
echo "<td>" . $row['id_car'] . "</td>";
 echo "<td bgcolor='#ADFF2F'>" . $row['name'] . "</td>";
 echo "<td>" . $row['model'] . "</td>";
 echo "<td bgcolor='#ADFF2F'>" . $row['year'] . "</td>";
 echo "<td>" . $row['trans'] . "</td>";
 echo "<td bgcolor='#ADFF2F'>" . $row['value'] . "</td>";
 echo "<td>" . $row['cost'] . "</td>";
$id_car=$row['id_car'];
 echo "<td><a href='edit.php?id=" . $id_car. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td bgcolor='#DC143C'><a href='delete.php?id=" . $id_car. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
echo ('<form method="POST" action="edit.php?id='. urlencode($id_car).'">');
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего наименований: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить машину </a>

<h2>Список салонов:</h2>
<table border="1">
<tr> 
<th> Номер </th> <th bgcolor="#ADFF2F"> Название </th> <th> Адрес</th>
 <th>  Редактировать </th> <th bgcolor='#DC143C'> Уничтожить </th> </tr>
<?php
$result= mysqli_query($link,"SELECT * FROM autosalon");
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
echo "<td>" . $row['id_salon'] . "</td>";
 echo "<td bgcolor='#ADFF2F'>" . $row['name_salon'] . "</td>";
 echo "<td>" . $row['address'] . "</td>";
$id_salon=$row['id_salon'];
 echo "<td><a href='edit_salon.php?id=" . $id_salon. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td bgcolor='#DC143C'><a href='delete_salon.php?id=" . $id_salon. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего наименований: $num_rows </p>");
?>
<p> <a href="new_salon.php"> Добавить салон </a>

<h2>Список машин в наличии:</h2>
<table border="1">
<tr> 
<th> Номер </th> <th bgcolor="#ADFF2F"> Машина </th> <th> Магазин </th><th bgcolor="#ADFF2F"> Стоимость </th>
 <th>  Редактировать </th> <th bgcolor='#DC143C'> Уничтожить </th> </tr>
<?php
$result= mysqli_query($link,"SELECT * FROM auto_nalich");
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
 echo "<td bgcolor='#ADFF2F'>" . $row['id_car'] . "</td>";
 echo "<td>" . $row['id_salon'] . "</td>";
 echo "<td bgcolor='#ADFF2F'>" . $row['cost'] . "</td>";
$id=$row['id'];
 echo "<td><a href='edit_nalich.php?id=" . $id. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td bgcolor='#DC143C'><a href='delete_nalich.php?id=" . $id. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего наименований: $num_rows </p>");
?>
<p> <a href="new_nalich.php"> Добавить машину в наличии </a>
<p> <a href="gen_xls.php"> Скачать XLS </a>
<p> <a href="gen_pdf_nal.php"> Скачать PDF </a>
</body> </html>