<?php
	session_start();
	$user=$_SESSION['sess_user'];
	$id=$_SESSION['test_id'];
	$num=$_SESSION["ques_num"];
	$qid=0;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'online_test') or die("cannot select DB");
	$query=mysqli_query($con,"SELECT * FROM questions WHERE test_id='$id'");
	$numrows=mysqli_num_rows($query);
	
		
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/ot.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Online Test</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet" />


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">
	<link href="assets/css/themify-icons.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-background-color="brown" data-active-color="danger">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text logo-mini">
					OQ
				</a>
				<a href="http://www.creative-tim.com" class="simple-text logo-normal">
					Online Quiz
				</a>
			</div>
			<div id='select' class="sidebar-wrapper">
			<ul class='nav'>
				<?php
				$i=1;
				$j=0;
				$k=0;
				$p=array();
				$questions=array();
				if($numrows>0)
				while ($row=mysqli_fetch_row($query))
				{//<?php $qid=$row[0];<a id='select' style='margin-top: 0px;' href='#dashboardOverview' $qid=$row[0]; >
					$questions[$j]=array();
					$questions[$j][0]=$row[0];
					$questions[$j][1]=$row[1];
					$questions[$j][2]=$row[2];
					$questions[$j][3]=$row[3];
					$questions[$j][4]=$row[4];
					$questions[$j][5]=$row[5];
					$questions[$j][6]=$row[6];
					$questions[$j][7]=$row[7];
					//$questions[]=array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
				//echo //"<p id=$i>$row[2]</p>";
				echo "<form method='post'><li>
				<button id=$j style='margin-top: 0px; width: 100px' name='select' value=$j >
							<i class='nav' style='font-style: normal;'>$i:</i>
								<p style='max-width: 200px; height: 32px; text-transform: none;overflow: hidden; margin: 0px; white-space: normal; word-wrap: normal; line-height: normal;font-size: 12px;'>$row[2]	
								 </p></button>
						</li></form>
					";
					
					$i=$i+1;
					$j=$j+1;
				}
					?>
					</ul>
			</div>
		</div>
		<div class="main-panel">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-minimize">
						<button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
						<p class="navbar-brand">
							Test Name
						</p>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<p style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 10px 15px;">Time goes here</p>
							</li>
							<li>
								<button onclick="location.href = 'user_result.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px;padding: 10px 15px;" class="btn btn-danger">
									End Test
                </button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content">
				<div class="group" id='ques'>
				
				<?php
				if(isset($_POST["select"]))
				{
					$num=$_POST["select"];
					$num1=$num+1;
				?>
				<h3 style='margin-top: 0px;'>Question: <?php echo $num1 ?></h3>
					<hr style='color: black; height: 1px; background-color: black;'>
					<p style='margin-bottom: 20px; font-size: 1.2em;'><?php echo $questions[$num][2]?></p>
					<form method='post'>
						<div style='margin: 10px 0px; padding: 10px; padding-left: 20px; border: 1px solid grey; border-radius: 10px;'>
							<input type='radio' name='answer' value='1'>
							<?php echo $questions[0][3]?><br>
						</div>
					  <div style='margin: 10px 0px; padding: 10px; padding-left: 20px;  border: 1px solid grey; border-radius: 10px;'>
					  	<input type='radio' name='answer' value='2'> <?php echo $questions[$num][4]?><br>
					  </div>
					  <div style='margin: 10px 0px; padding: 10px; padding-left: 20px;  border: 1px solid grey; border-radius: 10px;'>
					  	<input type='radio' name='answer' value='3'><?php echo $questions[$num][5]?> <br>
					  </div>
						<div style='margin: 10px 0px; padding: 10px; padding-left: 20px;  border: 1px solid grey; border-radius: 10px;'>
							<input type='radio' name='answer' value='4'><?php echo $questions[$num][6]?><br>
						</div>
						<?php
						echo "
						<input style='margin: 20px;' class='btn btn-warning pull-right' type='reset' name='Reset' value='reset'>
						<input style='margin: 20px;' class='btn btn-success pull-right' type='submit' name='submit' value=$num1>
					</form>";
					
				}
				?>
				<?php
				$cannot="SELECT any option !!";
				if(isset($_POST["submit"]))
				{
					$num2=$_POST["submit"];
					if(isset($_POST["answer"]))
					{
						$val=$_POST["answer"];
						$con=mysqli_connect('localhost','root','') or die(mysql_error());
						mysqli_select_db($con,'online_test') or die("cannot select DB");
						$query=mysqli_query($con,"SELECT user_ans FROM useranswer WHERE user_id='$user' and test_id='$id' and que_id='$num2'");
						$numrows=mysqli_num_rows($query);
						if($numrows==0)
						{
						$r=mysqli_query($con,"insert into useranswer(user_id,test_id,que_id,user_ans) values ('$user','$id','$num2','$val')");
						if($r)
						{echo "";}
						else
							echo "not";
						}
						else
						{
							$query=mysqli_query($con,"UPDATE useranswer SET user_ans='$val' WHERE user_id='$user' and test_id='$id' and que_id='$num2'");
							if($query)
								{echo "<script>
								function show_func(){
									$('#group').hide(); 
									$('#group').show(); 
								}
								</script>";}
							else
								echo "not upadted";
						}
					}
					else
					echo "<script type='text/javascript'>alert('$cannot');</script>";
				}
				?>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="http://www.creative-tim.com">
                    About
                </a>
							</li>
						</ul>
					</nav>
					<div class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>, made with <i class="fa fa-heart heart"></i> by Team MCA
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="assets/js/es6-promise-auto.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="assets/js/bootstrap-datetimepicker.js"></script>

<!--  Select Picker Plugin -->
<script src="assets/js/bootstrap-selectpicker.js"></script>

<!--  Switch and Tags Input Plugins -->
<script src="assets/js/bootstrap-switch-tags.js"></script>

<!-- Circle Percentage-chart -->
<script src="assets/js/jquery.easypiechart.min.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>

<!-- Vector Map plugin -->
<script src="assets/js/jquery-jvectormap.js"></script>

<!-- Wizard Plugin    -->
<script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="assets/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="assets/js/jquery.datatables.js"></script>

<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		demo.initOverviewDashboard();
		demo.initCirclePercentage();

	});
</script>

</html>
