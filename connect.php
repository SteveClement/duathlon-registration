<?php
$connection = mysql_connect('localhost', 'MD2015', 'wellYouStoleThisUnprivil3ged ASSw0rd');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('dbMD15');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}