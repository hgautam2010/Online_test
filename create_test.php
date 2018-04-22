<?php
		 session_start();
		 //if(!isset($_SESSION["sess_user"])){
		 //	header("location:index.php");
		 //}
		 $user=$_SESSION['sess_user'];
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
						<div class="collapse in" id="componentsExamples">
							<ul class="nav">
								<li class="active">
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
						<a class="navbar-brand" href="create_test.php">
							Create Test
						</a>
						<button onclick="location.href='start_test.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px; margin-right: 20px;padding: 10px 15px;" class="btn btn-success hidden-md hidden-lg pull-right">
							Start Test
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						<li>
								<button onclick="location.href='start_test.php';" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: 0px;margin-bottom: 16px;margin-left: 0px;padding: 10px 15px;" class="btn btn-success hidden-sm">
									Start Test
                </button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content">
				<div style="width: 60%; margin-left: auto; margin-right: auto;">
					<div class="card">
						<form method="post">
							<div class="card-header">
								<h4 class="card-title">
										Create Test
									</h4>
							</div>
							<div class="card-content">
								<div class="form-group">
									<label class="control-label">
											Name <star>*</star>
									</label>
									<input class="form-control" name="testname" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Category
									</label>
									<input class="form-control" name="category" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Total Questions <star>*</star>
									</label>
									<input class="form-control" name="totalq" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Correct Answers Marks
									</label>
									<input class="form-control" name="curr_ans" default="1" value="1" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Worng Answers Penalty
									</label>
									<input class="form-control" name="wng_ans" default="0" value="0" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Passing Marks
									</label>
									<input class="form-control" name="limit" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Start at <star>*</star>
									</label>
									<input type="text" name="st_datetime" class="form-control datetimepicker" placeholder="Start Date and Time" />
								</div>
								<div class="form-group">
									<label class="control-label">
											End at <star>*</star>
									</label>
									<input type="text" name="end_datetime" class="form-control datetimepicker" placeholder="End Date and Time" />
								</div>
								<div class="form-group">
									<label class="control-label">
											Test type <star>*</star>
									</label>
									<br>
									<span style="margin-right: 20%;"><input type="radio" name="testType" value="0" > Private</span>
								  <input type="radio" name="testType" value="1"> Public
								</div>
								<br>
								<div class="category">
									<star>*</star> Required fields</div>
							</div>
							<div class="card-footer">
								<button type="submit" action="addquestions.php" name="submit" class="btn btn-info btn-fill pull-right">Submit</button>

								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
<?php
			 if(isset($_POST["submit"]))
			 {
			 	if(!empty($_POST['testname']) && !empty($_POST['totalq']) && !empty($_POST['st_datetime']) && !empty($_POST['end_datetime']) && !empty($_POST['testType']))
			 	{
					$type=$_POST['testType'];
					$test_name=$_POST['testname'];
			 		$category=$_POST['category'];
			 		$totalq=$_POST['totalq'];
			 		$st_date=$_POST['st_datetime'];
			 		$end_date=$_POST['end_datetime'];
			 		$curr_ans=$_POST['curr_ans'];
			 		$wng_ans=$_POST['wng_ans'];
			 		$limit=$_POST['limit'];
					$st_date=date("Y-m-d H:i", strtotime($st_date));
					$st_date=$st_date.":00";
					$end_date=date("Y-m-d H:i", strtotime($end_date));
					$end_date=$end_date.":00";

			 		$con=mysqli_connect('localhost','root','') or die(mysql_error());
			 		mysqli_select_db($con,'online_test') or die("cannot select DB");
			 		$sql="INSERT INTO `tests`(`user_id`, `test_name`, `category`, `total_ques`, `startTest_dateTime`, `endTest_datetime`, `pt_curr`, `pt_neg`, `pass_limit`,  `type`) VALUES  ('$user','$test_name','$category','$totalq','$st_date','$end_date','$curr_ans','$wng_ans','$limit', '$type')";
					if ($con->query($sql) === TRUE) {
						$last_id = mysqli_insert_id($con);
						@$_SESSION['sess_test']=$last_id;
						@$_SESSION['sess_ques']=$totalq;
						echo("<script>location.href = '".addquestions.".php';</script>");
						//<script> location.replace("addquestions.php"); </script>
						//header('Location: addquestions.php');
					}

			 	}
			 	else
			 	{
			 		echo "FILL REQUIRED FIELDS !!";
			 	}
			 }
?>
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
<script type="text/javascript">
	$().ready(function() {
		demo.initFormExtendedDatetimepickers();
	});
</script>

</html>
