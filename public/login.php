<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php

if(isset($_POST['submit'])){
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$queryresult = mysqli_query($connection,"select * from fusers where fid = '{$uname}' and password = '{$password}';");
	confirm_query($queryresult);
			if (mysqli_num_rows($queryresult) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($queryresult);
				$_SESSION['user'] = $found_user['fid'];
				redirect_to("profile.php?link=null");
			}
			else{
			$message = "Username/password combination incorrect.<br />
			Please make sure your caps lock key is off and try again.";
			redirect_to("login.php?link=1");
		}
	}

?>

<body>

<center><h1>Login Form </h1></center>
<?php if (!empty($message)) {echo "<tr><td><p id='err' style='background-color:#FFFFFF;' class=\"message\">" . $message . "</p></td></tr>";} ?>
<form name="lf" onSubmit="return validate()" action="valid" method="post">
<table align=center>
<caption> Fill Your Details </i></font></caption>

<tr> <td>Name</td><td>  <input type=text name="un" size=20></td></tr>

<tr><td>Password  </td><td><input type=password name="pw" size=20></td></tr>

<tr><td>     <input type="submit" name="submit" value="submit"></td>
<td> <input type=reset name="reset" value="clear"></td></tr>

</table>
</form>

<script>
	 function validate()
   {

     var msg="";
	 
     var valid=false;

	

	 var passwd=document.lf.pw.value;

	

    var	 passwd_re=new RegExp("^[a-zA-Z][a-zA-Z '-.]{5,}$");
	 


    else valid=true;
	   return valid;
   }
  
   
</script>


</body>
</html>
