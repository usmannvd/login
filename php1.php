<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>


<?php

error_reporting(E_ALL ^ E_DEPRECATED);
$username = "root";
$password = "";
$hostname = "localhost";

$dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

$selected = mysql_select_db("userdata",$dbhandle)
    or die("Could not selected db2");
echo "Conneted to userdata<br>", "<br>";

session_start();
$_SESSION['acess']=false;
if($_POST)
 {
    if(isset($_POST['login']))
    {
		
        $loguser=$_POST['text1'];
		$logpass=$_POST['text2'];
		
		
		
  $query = "SELECT * FROM userinfo WHERE username = '$loguser' And password='$logpass'";
$result = mysql_query($query);
$rowSelected   = mysql_num_rows($result);
if ($rowSelected ) {
    while($row = mysql_fetch_array($result)) {
           if( $loguser = $row["username"]&& $logpass=$row["password"]);
		   {
            
			 $_SESSION['acess']=true;

			 $_SESSION['username1']=$_POST['text1'];
             

		   
		   header("Location: welcome.php");
		   
		   }
        }
}
else 
{
   
	 
	  echo  '<script language="javascript">';
       echo 'alert("username or passward invalid")';
       echo '</script>';
	   echo "<script>setTimeout(\"location.href = 'login.html';\",500);</script>";
	   
	   
	   
	
}
		
        
        
	
		
    }
	
	else if(isset($_POST['create']))
	{
	  
	 header("Location: create.html");
	}
  
    else if(isset($_POST['createaccount']))
    {
      
	  static $flag=2;
	  $flag++;
	  
	   $user=$_POST['text5'];
	   $pass=$_POST['text6'];
	   echo $user."<br>".$pass;
	   
	   $sql = "INSERT INTO userinfo ( userId,username,password) VALUES ('$flag','$user','$pass')";
       mysql_query($sql);
	   echo '<script language="javascript">';
       echo 'alert("your account  Has Been Activated.....username='.$user.'And Password='.$pass.'")';
       echo '</script>';
	   

 
    }
 
 
 }
  
?>
 
 </body>
</html>