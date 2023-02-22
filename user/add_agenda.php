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
    <title>Agendas</title>
    <style>
      .agenda{
        display: flex;
        border: 1px solid #ccc;
        height:200px;
        margin-top:50px;
      }
    </style>
</head>
<body>
  <div class="agenda">
  <h1>Add Agenda</h1>
<!-- HTML form to create a new agenda item -->
<form class="form-control" method="post" action="">
  <label for="topic">Topic:</label>
  <input type="text" id="topic" name="topic" >
  <br>
  <label for="description">Description:</label>
  <textarea id="description" name="description" ></textarea>
  <br>
  <label for="decision">Decision:</label>
  <textarea id="decision" name="decision" ></textarea>
  <br>
  <input type="submit" name="submit" value="Add more agenda">
  <input type="submit" name="submit1" value="Add Members">
</form>
  </div>
 


<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the agenda details from the form
  $topic = $_POST['topic'];
  $description = $_POST['description'];
  $decision = $_POST['decision'];
  $user_email = $_SESSION["login_user"];

  $sql="SELECT id
FROM call_meeting
WHERE email = '$user_email'
ORDER BY id DESC
LIMIT 1;";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$meeting_id = $row["id"];

  $stmt = ("INSERT INTO agendas (agenda_id,meeting_id, topic, description, decision) VALUES ('','$meeting_id ', '$topic', '$description', '$decision');");

  // Display a success message
  if (mysqli_query($db, $stmt)) {
    echo "New record created successfully";
    header("Locaton: add_agenda.php");

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);}
}
?>
<?php 
if(isset($_POST['submit1']))
{
  {
    // Get the agenda details from the form
    $topic = $_POST['topic'];
    $description = $_POST['description'];
    $decision = $_POST['decision'];
    $user_email = $_SESSION["login_user"];
  
    $sql="SELECT id
  FROM call_meeting
  WHERE email = '$user_email'
  ORDER BY id DESC
  LIMIT 1;";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  $meeting_id = $row["id"];
  
    $stmt = ("INSERT INTO agendas (agenda_id,meeting_id, topic, description, decision) VALUES ('','$meeting_id ', '$topic', '$description', '$decision');");
  
    // Display a success message
    if (mysqli_query($db, $stmt)) {
      echo "New record created successfully";
      header("Location: add_user_to_meeting.php");
  
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);}
  }
}
?>

</body>
</html>
