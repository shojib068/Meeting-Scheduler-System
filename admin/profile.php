<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
    

 	<style>
.button-container {
  margin-top: 50px;
  display: flex;
  margin: 0 auto;
  text-align: center;
  width: 20%;
  font-size:100px;
}

.popover {
  background-color: #007bff;
}

.popover-header {
  color: #fff;
}

.popover-body {
  color: #fff;
}

.btn-primary {
  margin: 10px;
  font-size:30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  
}

.btn-primary:hover {
  transform: scale(1.1);
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  float:center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

.glyphicon glyphicon-bell {
  font-size: 2em;
}

 	</style>
 </head>
 <body>
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM admin_login where email='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);
 			?>
			 <div style="text-align: center;"> <b>Welcome, </b>
					 <h4>
						 <?php echo $_SESSION['login_user']; ?>
					 </h4>
				 </div>
				 <div class="card">
				 <span class="glyphicon glyphicon-user"></span>
				 <h1><?php echo $row["firstname"]; ?>&nbsp;<?php echo $row['lastname'];?> </h1>
				 <span class="glyphicon glyphicon-tag"></span>
				 <p class="title">Admin</p> 	
				 <span class="glyphicon glyphicon-lock"></span> <P> <?php echo $row['password']; ?></P>	
				 <span class="glyphicon glyphicon-map-marker"></span>
		 
				 <p>University of Chittagong</p>
				 <a href="#"><i class="fa fa-dribbble"></i></a>
				 <a href="#"><i class="fa fa-twitter"></i></a>
				 <a href="#"><i class="fa fa-linkedin"></i></a>
				 <a href="#"><i class="fa fa-facebook"></i></a>
				 <p><button>Contact</button></p>
			   </div>
 		</div>
 	</div>
 </body>
 </html>
 