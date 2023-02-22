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
.form-control {
  max-width: 600px;
  margin:0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-group {
  margin-top:30px;
  margin-bottom: 20px;
 
}

label {
  position:relative;
  padding-left:20px;
  
  font-weight: bold;
 
  margin-left:50px;
}



.form-group input[type="radio"] {
  
  position:absolute;
  left:478px;
  margin-bottom:5px;
  
  
}
.form-group label:before {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 16px;
  height: 16px;
  border: 1px solid #ccc;
  border-radius: 50%;
  
  
}

.form-group input[type="radio"]:focus + label:before {
  box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
} 
button[type="submit"] {
 display:flex ; 
  margin: 0 auto;
  padding: 10px 20px;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0062cc;
}
p{
  margin-left:250px;
}
.form{
  margin-top:250px;
  border:0.5px solid #0062cc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

</style>
  
</head>
<body>
<div class="form-control">
<form name="signup" action="" method="POST">
  <div class="form">
       <b> <p>Sign Up as: </p></b>
       <div class="form-group">
       <label for="admin">Admin</label>
        <input type="radio" name="user" id="admin" value="admin">
       </div>
        
       <div class="form-group">
       <label for="user">User</label>
        <input type="radio" name="user" id="user" value="user" checked="">
       </div>
       
        
        </div>
        <button class="btn btn-default" type="submit" name="submit1">OK</button>
</form>

</div>
<?php 
if(isset($_POST['submit1']))
{
  if($_POST['user']=='admin')
  { ?>
    <script type="text/javascript">
          window.location="admin/registration.php"
        </script>
  <?php }

else
{ 
  ?>
  <script type="text/javascript">
  window.location="user/registration.php"
</script>
<?php
}
}
?>



    

</body>
</html>