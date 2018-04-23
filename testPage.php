<?php
	session_start();
	$user=$_SESSION['sess_user'];
	$_SESSION["test_id"] = $_GET["id"];
	$id=$_SESSION['test_id'];
	date_default_timezone_set('Indian/Comoro');
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
				<a href="javascript:void(0)" class="simple-text logo-mini">
					OQ
				</a>
				<a href="javascript:void(0)" class="simple-text logo-normal">
					Online Quiz
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li>
						<a href="home.php">
	              <i class="ti-panel"></i>
								<p>Home</p>
	          </a>
					</li>
					<li class="active">
						<a data-toggle="collapse" href="#componentsExamples">
							<i class="ti-ruler-pencil"></i>
							<p>Tests
							   <b class="caret"></b>
							</p>
						</a>
						<div class="collapse" id="componentsExamples">
							<ul class="nav">
								<li class="">
									<a href="components/buttons.html">
										<span class="sidebar-mini">CT</span>
										<span class="sidebar-normal">Create Test</span>
									</a>
								</li>
								<li>
									<a href="view_test.php">
										<span class="sidebar-mini">VT</span>
										<span class="sidebar-normal">View/Edit Test</span>
									</a>
								</li>
								<li>
									<a href="delete_test.php">
										<span class="sidebar-mini">DT</span>
										<span class="sidebar-normal">Delete Test</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a href="produce_result.php">
                <i class="ti-clipboard"></i>
                <p>
									Results
                </p>
            </a>
					</li>
					<li>
						<a href="changepassword.php">
                <i class="ti-key"></i>
                <p>
									Change Password
                </p>
            </a>
					</li>
					<li>
						<a href="logout.php">
                <i class="ti-share"></i>
                <p>
									Logout
                </p>
            </a>
					</li>
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
						<a class="navbar-brand" href="testPage.php">
							Rules
						</a>
					</div>
				</div>
			</nav>
			<div class="content" style="">

					<div style="height: 40vh;">
						<div class="" style=" display: block; width: 97.5%; height: 40vh; z-index: -1; position: absolute; overflow: hidden;">
							<img src="assets/test.jpg" alt="" style=" background-size: cover;">
						</div>
						<div style="margin-left: auto; margin-right: auto; font-size: 1.5em; text-align: center; color: white; width: 500px; padding-top: 20vh;"></div>
						<br>
						<form method="post">
							<button type="submit" name="start" class="btn btn-success" style="display: block;margin-left: auto; margin-right: auto; width: 100px;">Start</button>
						</form>
					</div>
					<?php
							$con=mysqli_connect('localhost','root','') or die(mysql_error());
							mysqli_select_db($con,'online_test') or die("cannot select DB");
							$query=mysqli_query($con,"SELECT * FROM tests WHERE test_id='$id'");
							$query1=mysqli_query($con,"select now() from DUAL");
							$val = mysqli_fetch_array($query1);
							$value=$val[0];
							$numrows=mysqli_num_rows($query);
							if($numrows>0)
							{
								$row=mysqli_fetch_row($query);

								echo "<p><h3> Test name: $row[2]</h3>
										<h4>Introduction</h4>
										<ol>
											<li>
												Total no of questions: $row[4]
											</li>
											<li>
												Points on correct answer: $row[7]
											</li>
											<li>
												Points deducted on wrong answer: $row[8]
											</li>
											<li>
												Passing marks are: $row[9]
											</li>
											<li>
												Start Time of test: $row[5]
											</li>
											<li>
												End Time of test: $row[6]
											</li>




										</ol>
										</p>";
							}
						?>
						<?php
							if(isset($_POST['start']))
							{
								//$query=mysqli_query($con,"select now() from DUAL");
								//echo "<script>console$query</script>";
								//$row=mysql_fetch_assoc($query);
								//echo $row;
								$query1=mysqli_query($con,"SELECT * FROM result WHERE test_id='$id' and user_id='$user'");
								$numrows=mysqli_num_rows($query1);
								if($numrows>0)
								{
									echo "<script type='text/javascript'>alert('YOU HAVE GIVEN THE TEST !!');</script>";
								}
								else
								{
								$sec = strtotime($row[5]);
								$sec2 =strtotime($row[6]);
								$query1=mysqli_query($con,"select now() from DUAL");
								$val = mysqli_fetch_array($query1);
								$sec1=strtotime($val[0]);
								echo $sec1." ";
								echo $sec." ";
								echo $sec2." ";
								$can="CAN START TEST";
								$cannot="CANNOT START TEST";
								if( ($sec1>=$sec) && ($sec1<$sec2))
								{
									@$_SESSION['ques_num']=$row[4];
									@$_SESSION['start_num']=0;
									@$_SESSION['test_id']=$id;
									echo("<script>location.href = '".test.".php';</script>");
								}
								else
									echo "<script type='text/javascript'>alert('$cannot');</script>";
								}
							}

					?>
					<br>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="new.html">
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
