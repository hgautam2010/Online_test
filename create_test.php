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
		session_start();
		if(!isset($_SESSION["sess_user"])){
			header("location:addquestions.php");
		}
		$user=$_SESSION['sess_user'];
		echo "LOGGED IN USER IS -----";
		echo $user;
		?>
		<br>
		<div class="add">
			<h1> ADD TEST</h1><br>
			<form method="post">
			<ol>
				<li> TEST NAME:<input type="text" name="testname" > <br></li>
				<li> CATEGORY:<input type="text" name="category" > <br></li>
				<li> TOTAL QUES:<input type="text" name="totalq" > <br></li>
				<li> START DATE and TIME:<input name="st_datetime" type="datetime-local"> <br></li>
				<li> END DATE and TIME:<input name="end_datetime" type="datetime-local"> <br></li
				<li> CORRECT ANSWER:<input type="number_format" name="curr_ans" default='1' > <br></li>
				<li> WRONG ANSWER:<input type="number_format" name="wng_ans" default='0' > <br></li>
				<li> PASSING LIMIT:<input type="number_format" name="limit" > <br></li>
					<br>	       
					<input type="submit" value="submit" name="submit">
					<input type="reset">
			</ol>
			</form>
		</div>
		<?php
			if($_POST[submit] )
			{
				if(!empty($_POST['testname']) && !empty($_POST['totalq']) && !empty($_POST['st_datetime']) && !empty($_POST['end_datetime']))
				{
					$test_name=$_POST['testname'];
					$category=$_POST['category'];
					$totalq=$_POST['totalq'];
					$st_date=$_POST['st_datetime'];
					$end_date=$_POST['end_datetime'];
					$curr_ans=$_POST['curr_ans'];
					$wng_ans=$_POST['wng_ans'];
					$limit=$_POST['limit'];
					$con=mysqli_connect('localhost','root','') or die(mysql_error());
					mysqli_select_db($con,'online_test') or die("cannot select DB");
					mysql_query("insert into test(test_name,category,total_que,start_date,end_date,pt_curr,pt_neg,pass_limit) values ('$testname','$category','$totque','$st_date','$end_date','$curr_ans','$wng_ans','$limit')",$con) or die(mysql_error());
					echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";
					$result=mysqli_query($con,"SELECT test_id FROM test WHERE username='".$user."' AND test_name='".$test_name."'");
					$_SESSION['sess_test']=$result;
					$_SESSION['sess_ques']=$totalq;
					echo "logged in session started";
						/* Redirect browser */
					header("Location: addquestions.php");
					unset($_POST);
				}
				else
				{
					echo "FILL REQUIRED FIELDS !!"
				}
			}
		?>
</body>
</html>