<?php
$link = mysqli_connect("localhost", "f0478659_root", "123","f0478659_cars");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
} 
$result = mysqli_query($link, "SELECT *FROM mashina"); 
$result2 = mysqli_query($link, "SELECT *FROM autosalon");
?>

<html>
     <title> Шарафиева Ксения </title>
<body style=" background-color:#FFFFCC">
<H2>Добавление машины в наличии:</H2>
<form action="save_new_nalich.php" metod="get">
 Машина:
 <?php
echo '<select name="z">
 <option>...</option>';
 while($row = mysqli_fetch_array($result)) {
echo  '<option value='.$row['id_car'].'>'.$row['name'].'</option>';
}
echo '</select>'; 
?>

<br>
<br>Салон: <!--<input name="id_salon" size="20" type="text">-->
 <?php
echo '<select name="f">
 <option>...</option>';
 while($row1 = mysqli_fetch_array($result2)) {
echo  '<option value='.$row1['id_salon'].'>'.$row1['name_salon'].'</option>';
}
echo '</select>'; 
?>
<br>
<br>Цена: <input name="cost" size="10" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку машин </a>
</body>
</html>