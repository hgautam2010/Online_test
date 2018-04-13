<?php
		 session_start();
		 $user=$_SESSION['sess_user'];
		 $_SESSION['sess_test']=$_GET["id"];
		 $id=$_GET["id"];
		 $con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,'online_test') or die("cannot select DB");
		$query=mysqli_query($con,"SELECT *FROM tests WHERE test_id='$id'");
		$numrows=mysqli_num_rows($query);
		if($numrows>0)
		{
			$row=mysqli_fetch_row($query);
		}			
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
								<li >
									<a href="components/buttons.html">
										<span class="sidebar-mini">CT</span>
										<span class="sidebar-normal">Create Test</span>
									</a>
								</li>
								<li>
									<a href="home.php">
										<span class="sidebar-mini">VT</span>
										<span class="sidebar-normal">View test</span>
									</a>
								</li>
								<li class="active">
									<a href="">
										<span class="sidebar-mini">ET</span>
										<span class="sidebar-normal">Edit Test</span>
									</a>
								</li>
								<li>
									<a href="components/starttest.php">
										<span class="sidebar-mini">ST</span>
										<span class="sidebar-normal">start test</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a href="#formsExamples">
                <i class="ti-clipboard"></i>
                <p>
									Results
                </p>
            </a>
					</li>
					<li>
						<a href="logout.php">
                <i class="ti-share"></i>
                <p>
									logout
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
						<a class="navbar-brand" href="#Dashboard">
							Edit Test
						</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
	                <i class="ti-bell"></i>
	                <span class="notification">5</span>
									<p class="hidden-md hidden-lg">
										Notifications
										<b class="caret"></b>
									</p>
                </a>
								<ul class="dropdown-menu">
									<li><a href="#not1">Notification 1</a></li>
									<li><a href="#not2">Notification 2</a></li>
									<li><a href="#not3">Notification 3</a></li>
									<li><a href="#not4">Notification 4</a></li>
									<li><a href="#another">Another notification</a></li>
								</ul>
							</li>
							<li>
								<a href="#settings" class="btn-rotate">
									<i class="ti-settings"></i>
									<p class="hidden-md hidden-lg">
										Settings
									</p>
                </a>
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
										Edit Test
									</h4>
							</div>
							<div class="card-content">
								<div class="form-group">
									<label class="control-label">
											Name <star>*</star>
									</label>
									<input class="form-control" name="testname" value="<?php echo $row[2] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true" disabled>
								</div>
								<div class="form-group">
									<label class="control-label">
											Category 
									</label>
									<input class="form-control" name="category" value="<?php echo $row[3] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Total Questions <star>*</star>
									</label>
									<input class="form-control" name="totalq" value="<?php echo $row[4] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Correct Answers Marks 
									</label>
									<input class="form-control" name="curr_ans" value="<?php echo $row[7] ?>" default="1" value="1" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Worng Answers Penalty 
									</label>
									<input class="form-control" name="wng_ans" value="<?php echo $row[8] ?>" default="0" value="0" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Passing Marks 
									</label>
									<input class="form-control" name="limit" value="<?php echo $row[9] ?>" type="text" required="true" email="true" autocomplete="off" aria-required="true">
								</div>
								<div class="form-group">
									<label class="control-label">
											Start at <star>*</star>
									</label>
									<input type="text" name="st_datetime" value="<?php echo $row[5] ?>"class="form-control datetimepicker" placeholder="Start Date and Time" />
								</div>
								<div class="form-group">
									<label class="control-label">
											End at <star>*</star>
									</label>
									<input type="text" name="end_datetime" value="<?php echo $row[6] ?> "class="form-control datetimepicker" placeholder="End Date and Time" />
								</div>
								<br>
								<div class="category">
									<star>*</star> Required fields</div>
							</div>
							<div class="card-footer">
								<button type="submit" action="editquestions.php" name="update" class="btn btn-info btn-fill pull-right">UPDATE</button>
								<button type="submit" action="editquestions.php" class="btn btn-info btn-fill pull-right">UPDATE QUESTIONS</button>
								
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
<?php
			 if(isset($_POST["update"]))
			 {
			 	if(!empty($_POST['testname']) && !empty($_POST['totalq']) && !empty($_POST['st_datetime']) && !empty($_POST['end_datetime']))
			 	{
					//$test_name=$_POST['testname'];
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
			 		$sql="UPDATE `tests` SET `category`=$category, `total_ques`=$totalq, `startTest_dateTime`=$st_date, `endTest_datetime`=$end_date, `pt_curr`=$curr_ans, `pt_neg`=$wng_ans, `pass_limit`=$limit WHERE test_id=$id";
					if ($con->query($sql) === TRUE) {
						echo "UPDATED";
						@$_SESSION['sess_test']=$id;
						@$_SESSION['sess_ques']=$totalq;
						echo("<script>location.href = '".editquestions.".php';</script>");
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
<script type="text/javascript">
	$().ready(function() {
		demo.initFormExtendedDatetimepickers();
	});
</script>

</html>
