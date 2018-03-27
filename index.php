<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
	<header>
		<div class="row">
				<h1>ONLINE QUIZ</h1>
				<ul>
					<li><a href="#">HOME</a></li>  	
					<li><a href="#">NOTIFICATIONS</a></li>
					<li><a href="#">ABOUT</a></li>
				</ul>
		</div>
	</header>
	<main>
		<div class="row">
			<div class="col">
				<form method="post">
					<h4>LOGIN</h4>
					<input type="text" name="username" > <br>
					<input type="password" name="password"> <br>
					<input type="submit" value="login" name="submit">
				</form>	  
				<a href="register.php">REGISTER</a>
			</div>
		</div>
	</main>
	<?php
if(isset($_POST["submit"])){
if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];
	echo $user;
	echo $pass;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$result=mysqli_query($con,"SELECT * FROM register WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($result);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	}
	if($user == $dbusername && $pass == $dbpassword)
	{
		$result=mysqli_query($con,"SELECT user_id FROM register WHERE username='".$user."' AND password='".$pass."'");
	session_start();
	$_SESSION['sess_user']=$result;
	echo "logged in session started";
	/* Redirect browser */
	header("Location: home.php");
	}
	} else {
	echo "Invalid username or password!";
	}
} else {
	echo "All fields are required!";
}
}
?>
</body>
</html>
