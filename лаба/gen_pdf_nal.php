<?php
require_once('tcpdf/tcpdf.php');
function fetch_data()
{
$servername = "localhost";
$database = "f0478659_cars";
$username = "f0478659_root";
$password = "123";
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
die("Connection failed: " . mysqli_connect_error());
}
$output .= '';
$result = mysqli_query($connection, "SELECT `auto_nalich`.`id`,
`auto_nalich`.`id_car`,`auto_nalich`.`id_salon`,`auto_nalich`.`cost`,`mashina`.`name`,`mashina`.`model`,
`mashina`.`year`, `mashina`.`trans`,`autosalon`.`address`,
`autosalon`.`name_salon` FROM `auto_nalich`
LEFT JOIN `mashina`
ON `auto_nalich`.`id_car`=`mashina`.`id_car`
LEFT JOIN `autosalon`
ON `auto_nalich`.`id_salon`=`autosalon`.`id_salon`");
while($row = mysqli_fetch_array($result)) {
$output .= '<tr>
<td>'.$row['id'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['model'].'</td>
<td>'.$row['year'].'</td>
<td>'.$row['trans'].'</td>
<td>'.$row['cost'].'</td>
<td>'.$row['name_salon'].'</td>
<td>'.$row['address'].'</td>
</tr>';
}
return $output;
}

$obj_pdf = new tcpdf('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

$obj_pdf-> SetTitle("Машины");

$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);

$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$obj_pdf->SetDefaultMonospacedFont('dejavusans');

$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);

$obj_pdf->setPrintHeader(false);

$obj_pdf->setPrintFooter(false);

$obj_pdf->SetAutoPageBreak(TRUE, 10);

$obj_pdf->setFontSubsetting(true);

$obj_pdf->SetFont('dejavusans', '', 12);

$obj_pdf->AddPage();

$content .= '';

$content .= '

<h3 align="center">Машины в наличии</h3><br /><br />

<table border="1" cellspacing="0" cellpadding="5">

<tr>

<th>№</th>

<th>Марка</th>

<th>Модель</th>
<th>Год выпуска</th>
<th>Трансмиссия</th>
<th>Стоимость</th>
<th>Название автосалона</th>
<th>Адрес</th>
</tr>

';

$content .= fetch_data();

$content .= '</table>';

$obj_pdf->writeHTML($content);

$obj_pdf->Output('cars.pdf', 'I');

?>