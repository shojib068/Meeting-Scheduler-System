<?php 
include "connection.php";
include "navbar.php";
?>
<style>
 

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid black;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #d1bcaf;
}

/*form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        */


</style>
<?php
  $user_email = $_SESSION["login_user"];
  

 
  
  // fetch the required information
  $query = "SELECT cm.id, cm.place,cm.title,cm.date, cm.time,cm.description, GROUP_CONCAT(am.attendee_mail SEPARATOR '  
       ||     ') AS attendees,a.description,a.topic,a.decision
            FROM call_meeting cm
            JOIN add_meeting am ON cm.id = am.meeting_id
            JOIN agendas a ON cm.id = a.meeting_id
            WHERE am.user_mail = '$user_email'
            GROUP BY cm.id, cm.place, cm.time, a.topic, a.description, a.decision";
  
  $result = mysqli_query($db, $query);
  
  // check if query is successful
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr>
    <th>Meeting ID</th>
    <th>Title</th>
    <th>Place</th>
    <th>Date</th>
    <th>Time</th>
    <th>Attendees</th>
    <th>Agendas'-Topic</th>
    <th>Description</th>
    <th>Decision</th>

    </tr>";
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
      <td>" . $row["id"] . "</td>
      <td>" . $row["title"] . "</td>
      <td>" . $row["place"] . "</td>
      <td>" . $row["date"] . "</td>
      <td>" . $row["time"] . "</td>
      <td>" . $row["attendees"] . "</td>
      <td>" . $row["topic"] . "</td>
      <td>" . $row["description"] . "</td>
      <td>" . $row["decision"] . "</td>

      </tr>";
    }
    echo "</table>";
  } else {
    echo "No data found for the user: " . $user_email;
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meeting List</title>
</head>
<body>
   <!--__________________________search bar________________________-->
   <div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Here you search.." required=""">
				<button type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
  <form action="generate-pdf.php" method="POST">
        <label for="meeting_id">Meeting ID:</label>
        <input type="text" name="meeting_id" id="meeting_id" required>
        <input type="submit" value="Submit">
</form>

  <?php
if (isset($_POST['submit'])) {
  $q=mysqli_query($db,"SELECT cm.id, cm.place,cm.title,cm.date, cm.time,cm.description, GROUP_CONCAT(am.attendee_mail SEPARATOR '  
  ||     ') AS attendees, a.description,a.topic,a.decision
       FROM call_meeting cm
       JOIN add_meeting am ON cm.id = am.meeting_id
       JOIN agendas a ON cm.id = a.meeting_id
       WHERE cm.id like '$_POST[search]' or am.attendee_mail like '%$_POST[search]%' or a.topic like '%$_POST[search]' or cm.title like '%$_POST[search]%'
       GROUP BY cm.id, cm.place, cm.time, a.topic, a.description, a.decision");

    if (mysqli_num_rows($q) == 0) {
        echo "Sorry! No such type meeting found. Try searching again.";
    } else {
      echo "<table><tr>
      <th>Meeting ID</th>
      </tr>";

        while ($row = mysqli_fetch_assoc($q)) {
          echo "<tr>";
            echo "<td>";
            echo $row['id'];
            $meeting_id = $row["id"];
            echo "</td>";
            echo "<td>";
            echo $row['title'];
            echo "</td>";
            echo "<td>";
            echo $row['place'];
            echo "</td>";
            echo "<td>";
            echo $row['description'];
            echo "</td>";
            echo "<td>";
            echo $row['time'];
            echo "</td>";
            echo "<td>";
            echo $row['date'];
            
            echo "</td>";
         echo "</tr>";
        }
        echo "</table>";
       

        ?>
        <form method="POST">
        <button type="submit" name="add_agenda" style="background-color:#101010ed;color:green;font-weight:700;" class="btn btn-default"> <span style="color:green;" class="glyphicon glyphicon-ok-sign"></span>
        <a href="edit_agenda.php">&nbsp Edit Agenda</a> </button></form>
  <?php  }
}

?>




</body>
</html>


