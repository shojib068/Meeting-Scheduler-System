<?php 
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  
	<title>
    Navbar
	</title>

	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
  /* Navigation bar styles */
.navbar {
  background-color: whitesmoke;
  border: 1px solid #ccc;
  margin-bottom:0;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  width:100%;
  height:auto;
}

.navbar-brand {
  color: #fff;
  font-size: 24px;
  font-weight: bold;
  display: block;
  margin: 0 auto;
  float:left;
}
.navbar-header img{
      width: 150px;
      height: auto;
      display: inline-block;
      padding-bottom: 0px;
      margin-top:-20px;

    }
    img {
  transition: transform 0.3s ease-in-out;

}

img:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.navbar-nav{
  float:right;
}
.navbar-nav li{
  padding:10px;
}
.navbar-right{
  margin-right:0;
}

.navbar-nav > li > a {
  color: black;
  font-size: 18px;
} 

.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus {
  background-color: dodgerblue;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.glyphicon{
  /* font-size:20px; */
  margin-right:5px;
  vertical-align:middle;
}
.container{
  width: 100%;
  height:auto;
}
</style>
</head>
<body>
  <?php
  $r=mysqli_query($db," SELECT COUNT(status) as total FROM message where status = 'no' and email='$-SESSION[login_user]' and sender='admin';");
  $c = mysqli_fetch_assoc($r);
   ?>

	    <nav class="navbar ">
      <div class="container">
          <div class="navbar-header">
          <img src="images/logo.png">
            <a class="navbar-brand"></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li> 
          </ul>
<?php 
if(isset($_SESSION['login_user']))
{
  ?>
   <ul class="nav navbar-nav">
    <li><a href="profile.php">Profile</a></li>
   </ul>
   <ul class="nav navbar-nav">
    <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span>
   <span class="badge bg-green">
    <?php
    echo $c['total'];
    ?>
   </span></a></li>
                  <li><a href="profile.php">
                    <div style="color: white">
                      <?php
                        echo "Welcome ".$_SESSION['login_user']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                </ul>
              <?php
}
else
{
  ?>
  <ul class="nav navbar-nav">
  <li><a href="registration.php"><span class="glyphicon glyphicon-user"> </span>Sign-Up</a></li>
  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> </span>Login</a></li>
 
  
</ul>
<?php
}
?>
               
                </div>
    </nav>

</body>
</html>