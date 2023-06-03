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
  margin-right: 300px;
  margin-top:-50px;
  /* display: inline-block; */
  vertical-align: center;
  
  text-align: center;
  width: 20%;
  font-size:100px;
  float:right;

}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 360px;
  margin-left:10px;
  text-align: center;
  height:360px;
  /* display:inline-block; */
  float:left;
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

.btn-default {
  margin: 10px;
  font-size:30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  
}

.btn-default:hover {
  transform: scale(1.1);
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
  width: 200px;
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

h2{
  margin-top:200px;
}
.button-container button{
	background-color:dodgerblue;
}

 	</style>
 </head>

 <body style="background-color: #F8F8FF; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-secondary" style="float:right; width: 70px;" name="submit1" type="submit">Edit</button>
 		</form>
		 <a type="submit" id="submit" name="submit" href="meeting_notification.php">
	
<?php 
if(isset($_POST['submit']))
{
	
	mysqli_query($db,"UPDATE add_meeting set status='yes' where user_email = '$_SESSION[login_user]';");
	unset($_SESSION['login_user']);
}
?>

 		<!-- <div class="wrapper"> -->
 			<?php
			
 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM registration where email='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center; ">My Profile</h2>

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
				 	<p class="title">User</p> 	
				 	<span class="glyphicon glyphicon-lock"></span> <P> <?php echo $row['password']; ?></P>	
				 	<span class="glyphicon glyphicon-map-marker"></span>
		 
				 	<p>University of Chittagong</p>
				 	<p><button>Contact</button></p>
				
			  
  					</span>
   </div>
  <div class="button-container text-center">
					
	<a href="call_meeting.php"><button class="btn btn-default" type="button">Call Meeting</button></a> 
					
	<a href="meeting_list.php"><button class="btn btn-default" type="button">Meeting List</button></a>
					
	<a href="edit_agenda.php"><button class="btn btn-default" type="button">Agendas</button></a>
	
	<a href="graph.php"><button class="btn btn-default" type="button">Graph</button></a>
					
</div>
 

			
</div>

</div>
</script>
 </body>
 </html>