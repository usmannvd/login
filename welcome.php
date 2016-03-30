<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styling1.css" rel="stylesheet" type="text/css" />
<title>welcome</title>
</head>

<body>

<?php
session_start();

if($_SESSION['acess'] == true)
{
      
	  if(isset($_SESSION["username1"]))
{

echo "welcome!!!".$_SESSION["username1"];






}


	  
	   

}

else
{
header("Location: login.html");


}
function logout()
{
echo "usman";

}

if($_POST)
{ 
if(isset($_POST['welcomeb']))
{
 session_destroy();
 header("Location: login.html");


}


}


?>
<br />
<form action="welcome.php" method="post">
<input type="submit" name="welcomeb" value="logout" />
</form>

</body>
</html>
