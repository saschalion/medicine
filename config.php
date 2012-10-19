<?php

//$dblocation = "web-fortun.mysql";
//$dbuser = "web-fortun_mysql";
//$dbpasswd = "";
//$dbname="web-fortun_bags";

$dblocation = "localhost";
$dbuser = "root";
$dbpasswd = "666";
$dbname="medicine";

$dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);

mysql_query ("set names='UTF8'");
mysql_query ("set character_set_client='UTF8'");
mysql_query ("set character_set_results='UTF8'");
mysql_query ("set collation_connection='UTF8'");

if (!$dbcnx) // Если дескриптор равен 0 соединение не установлено
{
    echo("<p>В настоящий момент сервер базы данных не
         доступен, поэтому корректное отображение страницы
         невозможно.</p>");
    exit();
}

if (!@mysql_select_db($dbname, $dbcnx))
{
    echo( "<p>В настоящий момент база данных не доступна,
          поэтому корректное отображение страницы невозможно.</p>" );
    exit();
}