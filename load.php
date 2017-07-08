<?php

$code = $_GET['CODE'];

require("./connect.php");
$query = mysqli_query($link,"SELECT * FROM url WHERE code='$code'"); 
$numrows = mysqli_num_rows($query);

if($numrows == 1){
  $row = mysqli_fetch_assoc($query);
  $url = $row['url'];
  header("Location: $url");
  echo "<script type ='text/javascript'>window.location = '$url'</script>";
 }
 else
 	echo "No shortened url was found.";

 mysql_close();
?>