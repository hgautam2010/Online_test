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
					<h4>REGISTER</h4>
					
					USERNAME:<br>
					<input type="text" name="user" > <br>
					PASSWORD:<br>
					<input type="password" name="pass"> <br>
					<input type="submit" name="submit" value="register">
				</form>
			</div>
		</div>
	</main>
	<?php
	//include 'init.php';
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	echo $user;
	echo $pass;
	$count=0;
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	//$query=mysqli_query($con,"SELECT * FROM register");
	//$numrows=mysqli_num_rows($query);
	//if($numrows==0)
	//	$count=1;
	//else
	//	$count=$numrows+1;
	$query=mysqli_query($con,"SELECT * FROM register WHERE username='".$user."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO register(username,password) VALUES('$user','$pass')";
	$result=mysqli_query($con,$sql);
	if($result){
	echo "Account Successfully Created";
	} else {
	echo "Failure!";
	}
	} else {
	echo "That username already exists! Please try again with another.";
	}
} else {
	echo "All fields are required!";
}
}
?>
</body>
</html>
