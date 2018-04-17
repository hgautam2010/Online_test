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
                        <a href="changepassword.php">
                <i class="ti-clipboard"></i>
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
            <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Change your Password</h1>
                <p style="color:red;"></p>
            
                   
                                <form name="chngpwd" method="post" onSubmit="return valid();">
              <table align="center">
              <tr height="50">
              <td>Old Password :</td>
              <td><input type="password" name="opwd" id="opwd"></td>
              </tr>
          <tr height="50">
              <td>New Passowrd :</td>
              <td><input type="password" name="npwd" id="npwd"></td>
              </tr>
          <tr height="50">
              <td>Confirm Password :</td>
              <td><input type="password" name="cpwd" id="cpwd"></td>
              </tr>
              <tr>
              <td><button type="submit" name="submit" value="Change Password" style="height: 40px;" class="btn btn-fill btn-wd ">Change Password</button>
          
              </tr>
                <tr>
              <td></td>
              <td></td>
              </tr>
              </table>
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
    