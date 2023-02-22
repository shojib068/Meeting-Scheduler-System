<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
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
  margin-right:5px;
  vertical-align:middle;
}
.container{
  width: 100%;
  height:auto;
}
/* here */


.box1{
  background-color: whitesmoke;
  box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.75);
  border-radius: 20px;
  margin: auto;
  width: 50%;
  padding: 20px;
  text-align: center;
  margin-top:100px;
}

h1 {
  font-size: 40px;
  font-family: 'Arial', sans-serif;
  text-align: center;
  margin-bottom: 30px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 4px;
  font-size: 18px;
}

input[type=radio] {
  display: inline-block;
  margin-top: 10px;
  padding:10px;
}

label {
  font-size: 20px;
  font-family: 'Arial', sans-serif;
  margin-left: 5px;
}

.box1 .btn{
  background-color: dodgerblue;
  color: #fff;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 4px;
  font-size: 20px;
  margin-bottom:20px;
  text-align: center;
  height:45px;
  width: 100px;
  text-align: center;
}



.box1 .btn:hover {
  opacity: 0.8;
}

a {
  color: dodgerblue;
  font-size: 18px;
}

p {
  font-size: 18px;
  font-family: 'Arial', sans-serif;
}


  </style>
  
</head>
<body>
  <div class="log_img">
    <br> <br><br>
    <div class="box1">
        <h1>User Login Form</h1>
      <form name="login" action="" method="POST">
        <b><p>Login as: </p></b>
        <input type="radio" name="user" id="admin" value="admin">
        <label for="admin">Admin</label>
        <input type="radio" name="user" id="user" value="user" checked="">
        <label for="user">User</label>
        <div class="login">
          <input  type="text" name="email" placeholder="Email" required=""> <br><br>
          <input type="password" name="password" placeholder="Password" required=""><br><br>
          <input class="btn btn-default btn-center" type="submit" name="submit" value="Login"> 
      </form>
      <p>
        
        <a href="update_password.php">Forgot password?</a>
        New to this website?<a href="registration.php">Sign Up</a>
      </p>
    </div>
  </div>
<?php 
if(isset($_POST['submit']))
{
  if($_POST['user']=='admin')
  {
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `admin_login` WHERE email='$_POST[email]' && password='$_POST[password]';");
    $count=mysqli_num_rows($res);

    if($count==0)
    {
      ?>
        <div class="alert alert-danger">
          <strong>The email and password doesn't match</strong>
        </div>    
      <?php
    }
    else
    {
      $_SESSION['login_user'] = $_POST['email']; 

      ?>
        <script type="text/javascript">
          window.location="admin/profile.php"
        </script>
      <?php
    }
  } else {
    $count = 0;
    $res = mysqli_query($db, "SELECT * FROM registration where email='$_POST[email]'and password='$_POST[password]' and status ='yes';");
    $count = mysqli_num_rows($res);
    if ($count == 0) {
      ?>
   <div class="alert alert-warning">
    <strong>The email or password doesn't match!!!</strong>
   </div>
   <?php
    } else {
      $_SESSION['login_user'] = $_POST['email'];

      ?>
    <script type="text/javascript">
      window.location="user/profile.php";
    </script>
    <?php
    }
  }
}
?>


</body>
</html>
<?php 
include "footer.php"; 
?>