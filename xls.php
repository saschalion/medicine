<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/demo/functions.php');

function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
}
function xlsEOF() {
    echo pack("ss", 0x0A, 0x00);
}
function xlsWriteNumber($Row, $Col, $Value) {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
}
function xlsWriteLabel($Row, $Col, $Value) {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
}

// prepare headers information
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=\"export_".date("Y-m-d").".xls\"");
header("Content-Transfer-Encoding: binary");
header("Pragma: no-cache");
header("Expires: 0");

// start exporting
xlsBOF();

// first row

mysql_query ("set names='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251'");

$sql = query("select * from patients");

while($record = mysql_fetch_assoc($sql))

$records[] = $record;

xlsWriteLabel(0, 0, '#');
xlsWriteLabel(0, 1, 'Фамилия');
xlsWriteLabel(0, 2, 'Имя');
xlsWriteLabel(0, 3, 'Отчество');
xlsWriteLabel(0, 4, 'Дата рождения');
xlsWriteLabel(0, 5, 'Пол');
xlsWriteLabel(0, 6, 'Заболевание');
xlsWriteLabel(0, 7, 'Телефон');
xlsWriteLabel(0, 8, 'Адрес');

for($i = 0; $i <= count($records); $i++) {
    xlsWriteNumber($i+1, 0, $records[$i]['id']);
    xlsWriteLabel($i+1, 1, $records[$i]['last_name']);
    xlsWriteLabel($i+1, 2, $records[$i]['first_name']);
    xlsWriteLabel($i+1, 3, $records[$i]['patronymic']);
	xlsWriteLabel($i+1, 4, $records[$i]['date_birth']);
	xlsWriteLabel($i+1, 5, $records[$i]['sex']);
	xlsWriteLabel($i+1, 6, $records[$i]['desease']);
	xlsWriteLabel($i+1, 7, $records[$i]['phone']);
	xlsWriteLabel($i+1, 8, $records[$i]['address']);
}

// end exporting
xlsEOF();

print "<META HTTP-EQUIV=Refresh content=0;URL=/>";