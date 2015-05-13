<?php
$connection = mysqli_connect('localhost', 'MD2015', 'wellYouStoleThisUnprivil3ged ASSw0rd');
if (!$connection){
    die("Database Connection Failed" . mysqli_error());
}
$select_db = mysqli_select_db('dbMD15');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error());
}