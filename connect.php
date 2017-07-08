<?php

$server ="localhost";
$db_user ="root";
$db_pass = "Qwerty1";
$db_table = "urlshortner";

$link = mysqli_connect($server,$db_user, $db_pass,"test");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_select_db($link,$db_table);
?>