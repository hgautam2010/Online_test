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
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
		</div>
	</header>
	<br><br>
	<?php
		/*session_start();
		if(!isset($_SESSION["sess_user"])){
			header("location:index.php");
		}
		$user=$_SESSION['sess_user'];
		echo "LOGGED IN USER IS -----";
		echo $user;*/
		if(!isset($_GET)) {
			$topic =$_GET['user_id'];    
			echo "Get". $topic ;
		}  
		?>
		<div class="action">
		<ol>
			<a href="create_test.php">CREATE TEST</a><br>
			<a href="">VIEW TEST</a><br>
			<a href="">EDIT TEST</a><br>
			<a href="">START TEST</a><br>
		</ol>
</body>
</html>
