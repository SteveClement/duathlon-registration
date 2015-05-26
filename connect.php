<?php
// mysqli connection variable
$connection = mysqli_connect('localhost', 'MD15', 'wellYouStoleThisUnprivil3ged ASSw0rd');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

// select the correct db and die if something went wrong
$select_db = mysqli_select_db($connection, 'dbMD15');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>