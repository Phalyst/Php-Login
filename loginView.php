<?php
session_start();
require_once("loginController.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
  if(class_exists("loginController")){
	
	 $loginController = new loginController();
	 $loginDetails = array();
	 $loginDetails['userName'] = $_POST['userName'];
     $loginDetails['password'] = $_POST['password'];
	 
	 $loginController->getLogin($loginDetails);
	 
	 if(isset($_SESSION['login_username'])){
		echo "<p>Hello {$_SESSION['login_username']}</p>";
		echo '<form  method="GET" action="loginView.php">';
		echo '<input value="logout" type="submit"   name="logout" onclick="logout()"/>';
		echo ' </form ">';
	 }
	 else if(isset($_GET['logout'])){
		 $loginController->logout();
	 }
	 else{
		 echo 'Invalid login details!!';
		 
	 }
	 
	 
  }    
  else{
	  exit("<p>ERROR</p>");
  }
 
  

?>
</body>
</html>
