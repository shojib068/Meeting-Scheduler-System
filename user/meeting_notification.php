<?php include "navbar.php";
include "connection.php";
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
 
 
 </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Notification</title>
</head>
<body>
<?php
  $user_email = $_SESSION["login_user"];
  

 
  
  // fetch the required information
  $query = "SELECT cm.id, cm.place,cm.title,cm.date, cm.time,cm.description, a.description,a.topic
       FROM call_meeting cm
       JOIN add_meeting am ON cm.id = am.meeting_id
       JOIN agendas a ON cm.id = a.meeting_id
       WHERE am.attendee_mail = '$user_email'
       GROUP BY cm.id, cm.place, cm.time, a.topic, a.description, a.decision
       order by cm.date, cm.time";
  
  $result = mysqli_query($db, $query);
  
  // check if query is successful
  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr>
    <th>Meeting ID</th>
    <th>Title</th>
    <th>Place</th>
    <th>Date</th>
    <th>Time</th>
    <th>Description</th>
    <th>Agendas</th>

    </tr>";
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
      <td>" . $row["id"] . "</td>
      <td>" . $row["title"] . "</td>
      <td>" . $row["place"] . "</td>
      <td>" . $row["date"] . "</td>
      <td>" . $row["time"] . "</td>
      <td>" . $row["description"] . "</td>
      <td>" . $row["topic"] . "</td>
      </tr>";
    }
    echo "</table>";
  } else {
    echo "No data found for the user: " . $user_email;
  }
  

?>
</body>
</html>