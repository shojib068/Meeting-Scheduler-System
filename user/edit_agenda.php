<?php
include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Agenda</title>
</head>
<style>
	
 .edit{
	border:1px solid #ccc;
	float:center;
	width:360px ;
	height:auto;
	margin-top:200px;
	margin-left:700px;
}
</style>
<body>
<form class="form-control" action="" method="post">
      
<div class="container">
	<div class="edit">
     <h1> <label for="decision">Decision:</label></h1>
      <textarea name="decision" value="<?php echo $row['decision']; ?>"></textarea><br>
<h1>
      <label for="date">Date:</label></h1>
      <input type="date" name="date" value="<?php echo $row['date']; ?>"><br>
<h1>
      <label for="time">Time:</label></h1>
      <input  type="time" name="time" value="<?php echo $row['time']; ?>"><br>

      <input type="submit" class="btn btn-primary" value="Save Changes" style="margin-top:20px; margin-bottom:20px; ">
	  </div>
	  </div>
    </form>
    <?php 

		if(isset($_POST['submit']))
		{

			$decision=$_POST['decision'];
			$date=$_POST['date'];
			$time=$_POST['time'];
			$_SESSION["id"] = $row["id"];
			$id=$_SESSION["id"];
			
			

			$sql1= "UPDATE call_meeting SET   decision='$decision', date='$date',time='$time' WHERE id='$id";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="meeting_list.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>