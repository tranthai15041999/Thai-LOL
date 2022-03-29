
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
session_start();
$_SESSION["thai"] = 12345;

 ?>
 <form action="transmit.php" method="post">
 	<input type="submit" name="send" value="submit">

 </form>


</body>
</html>

