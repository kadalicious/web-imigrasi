<?php 

include "server/koneksi.php";

$getpaspor = $_GET['paspor'];


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<img src="paspor/<?php echo $getpaspor; ?>" style="width: 100%; height: 500px;">
 
 </body>
 </html>