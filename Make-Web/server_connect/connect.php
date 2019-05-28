<?php
session_start();

$connect = mysql_connect('localhost', 'root', 'apmsetup');
mysql_select_db(makeweb, $connect);

?>