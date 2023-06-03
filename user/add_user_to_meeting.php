<?php
include "connection.php";
 include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User to Meeting</title>
</head>
<body>

<div style="float:right; justify-content:flex-end;" class="right">
<h2 style="margin-right:350px;">Select the members whom you want to invite</h2>
    </div>
    <!--__________________________search bar________________________-->
    <div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search by email.." required=""">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
<?php
if (isset($_POST['submit'])) {
    $q = mysqli_query($db, "SELECT id,firstname,lastname,username, email from registration where email like '%$_POST[search]%' ");

    if (mysqli_num_rows($q) == 0) {
        echo "Sorry! No user found. Try searching again.";
    } else {
        echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
        //Table header
        echo "<th>";
        echo "ID";
        echo "</th>";
        echo "<th>";
        echo "First Name";
        echo "</th>";
        echo "<th>";
        echo "Last Name";
        echo "</th>";
        echo "<th>";
        echo "User Name";
        echo "</th>";
        echo "<th>";
        echo "E-Mail";
        echo "</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr>";
            echo "<td>";
            echo $row['id'];
            echo "</td>";
            echo "<td>";
            echo $row['firstname'];
            echo "</td>";
            echo "<td>";
            echo $row['lastname'];
            echo "</td>";
            echo "<td>";
            echo $row['username'];
            echo "</td>";
            echo "<td>";
            echo $row['email'];
            $_SESSION["attendee_mail"] = $row["email"];
            echo "</td>";


            echo "</tr>";
        }
        echo "</table>";
        ?>
        <form method="POST">
        <button type="submit" name="add_to_meeting" style="background-color:#101010ed;color:green;font-weight:700;" class="btn btn-default"> <span style="color:green;" class="glyphicon glyphicon-ok-sign"></span>&nbsp Add to Meeting </button></form>
  <?php  }
}

?>
<?php
if(isset($_POST['add_to_meeting']))
{
    $user_email = $_SESSION["login_user"];
      
      $attendee_date= $_SESSION["date"];
      
       $attendee_time= $_SESSION["time"];
    
$attendee_email = $_SESSION["attendee_mail"];
$sql="SELECT id
FROM call_meeting
WHERE email = '$user_email'
ORDER BY id DESC
LIMIT 1;";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$meeting_id = $row["id"];


$sql = "INSERT INTO add_meeting (id,meeting_id, user_mail, attendee_mail,status)
VALUES ('','$meeting_id', '$user_email', '$attendee_email','')";


if (mysqli_query($db, $sql)) {
    echo "Meeting attendee added successfully";

    // showing the attendee list which i have added
    $res=mysqli_query($db,"SELECT id, attendee_mail FROM `add_meeting` where meeting_id= $meeting_id and user_mail='$user_email';");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				
				
				echo "<th>"; echo "Selected ";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
                echo "<td>"; echo $row['attendee_mail']; 
                echo "</td>";
		

				echo "</tr>";
			}
		echo "</table>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
}
?>
<?php 
//email starts
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require ('../PHPMailer-master/src/Exception.php');
require '../PHPMailer-master/src/PHPMailer.php';
require ('../PHPMailer-master/src/SMTP.php');
if(isset($_POST['add_to_meeting']))
{
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;
    $mail -> Username = 'kawsarshojib068@gmail.com';
    $mail ->Password = 'gxgmnszcqpqswnsr';
    $mail->SMTPSecure="tls";
    $mail ->Port = 587;
    $mail ->setFrom('kawsarshojib068@gmail.com');
    $mail ->addAddress('asifmahmudmeraj2016@gmail.com');
    $mail ->isHTML(true);
    $mail ->Subject ="Always same";
    $mail ->Body = 'No body';
    $mail -> send();
    }catch (Exception $e){
        echo "Message could not be sent. Mail Error:{$mail->ErrorInfo}";
    }
    


}





//email ends
?>

</body>
</html>