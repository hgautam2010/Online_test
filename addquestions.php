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
		<div class="add">
			<h1> ADD QUESTIONS</h1><br>
			<form method="post">
			<ol>
				<l1> QUESTION DESCRIPTION: <br><textarea id="desc" rows="4" cols="100" maxlength="700" placeholder="enter question"></textarea><br></li>
				<ol>
					<li>OPTION 1:<textarea id="op1" rows="3" cols="50" maxlength="200" placeholder="enter option 1"></textarea><br></l1>
					<li>OPTION 2:<textarea id="op2" rows="3" cols="50" maxlength="200" placeholder="enter option 2"></textarea><br></l1>
					<li>OPTION 3:<textarea id="op3" rows="3" cols="50" maxlength="200" placeholder="enter option 3"></textarea><br></l1>
					<li>OPTION 4:<textarea id="op4" rows="3" cols="50" maxlength="200" placeholder="enter option 4"></textarea><br></l1>
					<li> CORRECT ANSWER:<input type="text" name="curr_ans" ></li><br>
					<br>	       <input type="submit" value="submit" name="submit">
					<input type="reset">
				</ol>
			</ol>
			</form>
		</div>
	<?php
		session_start();
		
		$test_id=$_SESSION['sess_test'];
		$count=$_SESSION['sess_ques'];
		?>
	<?php
		
		if(isset($_POST["submit"])){
		if($count>0 &&!empty($_POST['desc']) && !empty($_POST['op1']) && !empty($_POST['op2'])&& !empty($_POST['op3'])&& !empty($_POST['op4']) && !empty($_POST['curr_ans'])) 
		{
			
			$des=$_POST['desc'];
			$opt1=$_POST['op1'];
			$opt2=$_POST['op2'];
			$opt3=$_POST['op3'];
			$opt4=$_POST['op4'];
			$curr_ans=$_POST['curr_ans'];
			echo $des;
			echo $opt1;
			echo $opt2;
			echo $opt3;
			echo $opt4;
			
			$con=mysqli_connect('localhost','root','');
			mysqli_select_db($con,'online_test') or die("cannot select DB");
			mysql_query("insert into question(test_id,que_desc,opt1,opt2,opt3,opt4,curr_ans) values ('$test_id','$des','$opt1','$opt2','$opt3','$opt4','$curr_ans')",$cn) or die(mysql_error());
			$count=$count-1;
			echo "<p align=center>Question Added Successfully.</p>";
		unset($_POST);
	
		}
		else{
			if($count==0)
			{
				header("Location: home.php");
			}
			else
				echo"ENTER REQUIRED FIELDS !!";
		}
			
		}
	?>
		
</body>
</html>