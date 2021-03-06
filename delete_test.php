<?php
	session_start();
	if(!isset($_SESSION["sess_user"])){
		header("location:index.php");
	}
	$user=$_SESSION['sess_user'];
	$n=$_SESSION['sess_name'];

	/*if(!isset($_GET)) {
		$topic =$_GET['user_id'];
		echo "Get". $topic ;
	}*/
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
						<div class="collapse in" id="componentsExamples">
							<ul class="nav">
								<li>
									<a href="create_test.php">
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
								<li class="active">
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
						<a class="navbar-brand" href="delete_test.php">
							Delete Test
						</a>
						
						</div>
						<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								
							</li>
						</ul>
						</div>
				</div>
			</nav>
			<div class="content">
			<div class='card-body' style='padding: 10px;'>
			<form method='post'>
					<?php
							$con=mysqli_connect('localhost','root','') or die(mysql_error());
							mysqli_select_db($con,'online_test') or die("cannot select DB");
							$query=mysqli_query($con,"SELECT t.test_id,t.test_name,t.start_date,t.duration,t.total_ques FROM test t,subject s WHERE s.t_id='$user' and s.s_id=t.sub_id order by t.start_date desc");
							$numrows=mysqli_num_rows($query);

							if($numrows>0)
							while ($row=mysqli_fetch_row($query))
							{
								$id=$row[0];

								echo "
								<div class='card' style='width: 50%; margin-left: auto; margin-right: auto;' >
									<div class='card-body' style='padding: 10px;'><h4 style='margin: 0px;color: #50C1E9; text-shadow: none;'>$row[1]</h4></div>
									<hr style='margin: 0px;'>
									<div class='' style='width: 100%;'>
										<div class='card-body' style='padding: 10px;'><b>Start Date :</b> $row[2]</div>
										<div class='card-body' style='padding: 10px;'><b>Duration : </b> $row[3] </div>
										<div class='card-body' style='padding: 10px;'><b>Total Questions : </b> $row[4] </div>

									</div>
									<div style='padding: 15px; text-align: center; margin-right: 20px;'>
											<button type='submit' name='delete' value='$row[0]' class='btn btn-danger data-active-color btn-fill pull-right'>Delete Test</button>
										<div class='clearfix'></div>
									</div>
								</div>
								";

							}
							else
							{
								echo "<div class='card-body' style='padding: 10px;'><h6 style='margin: 0px;'>NO TEST CREATED BY YOU TILL NOW</h6></div>";
							}
				?>
				</form>
				<?php
				if(isset($_POST["delete"]))
				{
					$confrm="Test Deleted !!";
					$id=$_POST["delete"];
					echo $id;
					$query3=mysqli_query($con,"delete from useranswer where test_id='$id'");
					$query2=mysqli_query($con,"delete from result where test_id='$id'");
					$query1=mysqli_query($con,"delete from ques_link where test_id='$id'");
					$query=mysqli_query($con,"delete from test where test_id='$id'");
					
					if($query && $query1 && $query2)
					{
						echo "<script type='text/javascript'>alert('$confrm');</script>";
						echo("<script>location.href = '".delete_test.".php';</script>");
					}

				}
				?>
			</div>
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
