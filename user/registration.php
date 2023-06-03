<?php
include "connection.php";
include "navbar.php"; 
?>
<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
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
/* here */
.reg_img {
  text-align: center;
}

.box2 {
  display: inline-block;
  margin: 20px;
  padding: 20px;
  box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.3);
}

.heading {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
  .btn {
  background-color: blue;
  color: white;
  padding: 5px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  height: 30px;
  width:100px;
  margin-top: 10px;
}

.btn:hover {
  background-color: darkblue;
}



</style>
  
</head>
<body>

  <div class="reg_img">

    <div class="box2">
        <h1 class="heading"> User Registration Form</h1>
      <form name="Registration" action="" method="POST">
        <br>
        <div class="login">
          <input class="form-control" type="text" name="firstname" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="lastname" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up"> 

      </form>
     
    </div>
  </div>


<?php

if(isset($_POST['submit']))
{
  $count=0;
  $sql="SELECT email from registration";
  $res=mysqli_query($db,$sql);

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['email']==$_POST['email'])
    {
      $count=$count+1;
    }
  }
  if($count==0)
  {
    mysqli_query($db,"INSERT INTO registration ( `firstname`, `lastname`, `username`, `email`, `password`)
    VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[email]','$_POST[password]')");
  ?>
  <script type="text/javascript">
          window.location="../login.php"
        </script>
  <?php
  }
  else
  {

    ?>
      <script type="text/javascript">
        alert("The user already exists!!!.");
      </script>
    <?php

  }

}

?>



    

</body>
</html>