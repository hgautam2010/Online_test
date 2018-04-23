<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION["sess_user"]))
{
        header("location:index.php");
 }
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
<script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>
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
                <i class="ti-panel">
                </i>
                <p>Home
                </p>
              </a>
            </li>
            <li>
              <a data-toggle="collapse" href="#componentsExamples">
                <i class="ti-ruler-pencil">
                </i>
                <p>Tests
                  <b class="caret">
                  </b>
                </p>
              </a>
              <div class="collapse" id="componentsExamples">
                <ul class="nav">
                  <li>
                    <a href="create_test.php">
                      <span class="sidebar-mini">CT
                      </span>
                      <span class="sidebar-normal">Create Test
                      </span>
                    </a>
                  </li>
                                <li>
                                    <a href="view_test.php">
                                        <span class="sidebar-mini">VT</span>
                                        <span class="sidebar-normal">View/Edit test</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="delete_test.php">
                                        <span class="sidebar-mini">ST</span>
                                        <span class="sidebar-normal">Delete test</span>
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
                    <li class="active">
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
                            Change Password
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

              <div class="row">
                  <div class="col-lg-12 text-center">
                    <h1>Change your Password
                    </h1>
                    <p style="color:red;">
                    </p>
                    <form name="chngpwd" method="post" onSubmit="return valid();">
                      <table align="center">
                        <tr height="50">
                          <td>
                            Old Password :
                          </td>
                          <td>
                            <input type="password" name="opwd" id="opwd">
                          </td>
                        </tr>
                        <tr height="50">
                          <td>
                            New Passowrd :
                          </td>
                          <td>
                            <input type="password" name="npwd" id="npwd">
                          </td>
                        </tr>
                        <tr height="50">
                          <td>
                            Confirm Password :
                          </td>
                          <td>
                            <input type="password" name="cpwd" id="cpwd">
                          </td>
                        </tr>
                      </table>
                      <br>
                      <div style="text-align: center;">
                        <button type="submit" name="submit" value="Change Password" style="height: 40px;" style="line-height: 1.42857;font-weight: 900; margin: 16px 0px;margin-top: 16px;margin-right: auto;margin-bottom: 16px;margin-left: auto; padding: 10px 15px;" class="btn btn-fill btn-wd ">
                          Change Password
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
        <?php
            if(isset($_POST["submit"]))
            {

                $oldpass=$_POST["opwd"];
                $newpassword=$_POST["npwd"];
                $cpd=$_POST["cpwd"];
                mysqli_select_db($con,'online_test') or die("cannot select DB");
                $sql=mysqli_query($con, "SELECT password FROM register where  user_id='$user' && password='$oldpass' ");
                if($sql)
                {
                    $num=mysqli_fetch_array($sql);
                    $p=$num[0];
                    if($oldpass==$p)
                    {
                        $con=mysqli_query($con,"update register set password='$newpassword' where user_id='$user'");
                        echo "PASSWORD CHANGED !!";
                    }
                    else
                    {
                        echo "PASSWORD DIDNT MATCH !!";
                    }
                }
                else
                {
                    echo "PASSWORD IS INCORRECT !!";
                }
            }
        ?>
          <!-- /.row -->
        </div>
        <footer class="footer" style="border: 0px;">
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
              </script>, made with
              <i class="fa fa-heart heart">
              </i> by Team MCA
            </div>
          </div>
        </footer>
      </div>
    </div>
  </body>
  <!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
  <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript">
  </script>
  <script src="assets/js/jquery-ui.min.js" type="text/javascript">
  </script>
  <script src="assets/js/perfect-scrollbar.min.js" type="text/javascript">
  </script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript">
  </script>
  <!--  Forms Validations Plugin -->
  <script src="assets/js/jquery.validate.min.js">
  </script>
  <!-- Promise Library for SweetAlert2 working on IE -->
  <script src="assets/js/es6-promise-auto.min.js">
  </script>
  <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
  <script src="assets/js/moment.min.js">
  </script>
  <!--  Date Time Picker Plugin is included in this js file -->
  <script src="assets/js/bootstrap-datetimepicker.js">
  </script>
  <!--  Select Picker Plugin -->
  <script src="assets/js/bootstrap-selectpicker.js">
  </script>
  <!--  Switch and Tags Input Plugins -->
  <script src="assets/js/bootstrap-switch-tags.js">
  </script>
  <!-- Circle Percentage-chart -->
  <script src="assets/js/jquery.easypiechart.min.js">
  </script>
  <!--  Charts Plugin -->
  <script src="assets/js/chartist.min.js">
  </script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js">
  </script>
  <!-- Sweet Alert 2 plugin -->
  <script src="assets/js/sweetalert2.js">
  </script>
  <!-- Vector Map plugin -->
  <script src="assets/js/jquery-jvectormap.js">
  </script>
  <!-- Wizard Plugin    -->
  <script src="assets/js/jquery.bootstrap.wizard.min.js">
  </script>
  <!--  Bootstrap Table Plugin    -->
  <script src="assets/js/bootstrap-table.js">
  </script>
  <!--  Plugin for DataTables.net  -->
  <script src="assets/js/jquery.datatables.js">
  </script>
  <!--  Full Calendar Plugin    -->
  <script src="assets/js/fullcalendar.min.js">
  </script>
  <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
  <script src="assets/js/paper-dashboard.js">
  </script>
  <!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js">
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      demo.initOverviewDashboard();
      demo.initCirclePercentage();
    }
                     );
  </script>
</html>
