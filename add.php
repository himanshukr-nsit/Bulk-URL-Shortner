<!DOCTYPE html>

<html>

<head>
  <meta http-equiv="Content-Type" content ="text/html"; charset = utf-8 />
  <title> URL SHORTNER</title>
  <link href ="./main.css" rel="stylesheet" type="text/css"</link>
</head>

<body>
  <?php
     if($_POST['shortbtn']){
     	$url = $_POST['url'];
     if($url){
        require("./connect.php");
         
         $charset="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
         $len = 5;
         $numrows = 1;
         $code= "";

         while ($numrows != 0) {
        
         for( $i = 0; $i<=$len; $i++){
            $rand = rand() % strlen($charset);
            $temp = substr($charset, $rand, 1);
            $code .=  $temp;
           }

         $query = mysqli_query($link,"SELECT * FROM url WHERE code='$code'");
         $numrows =mysqli_num_rows($query);

         }

         $date = date("F d ,Y"); 
         mysqli_query($link,"INSERT INTO url VALUEs('','$url','$code','$date')");
         $query = mysqli_query($link,"SELECT * FROM url WHERE code ='$code'");
         $numrows = mysqli_num_rows($query);
         if($numrows == 1){
         	$site ="http://localhost/URL Shortner";
            echo"Here is your shortened URL <input type = 'text' size='40' value='$site/$code'>";
          }   
        mysqli_close($link);
       }
     else
     	echo "<script type='text/javscript'>window.location ='./index.php'</script>";
    }
    else
     	echo "<script type='text/javscript'>window.location ='./index.php'</script>";
?>
 
</body>
</html> 