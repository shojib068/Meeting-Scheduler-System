<?php
include "connection.php";
 include "navbar.php";
 if (isset($_POST['create_meeting']))
{

  $selected_meeting=$_POST['meeting_type'];
  if($selected_meeting ==='meeting3')

  {
    $title= 'Others';
    $description='This is demo 3';
  }
  elseif ($selected_meeting === 'meeting2') 
  {
    $title = 'ICPC';
    $description = 'ICPC meeting';
  }
  elseif ($selected_meeting === 'meeting1')
   {
   
    $title = 'Exam Committee';
    $description = 'Exam Committee meeting';
  }

    $date = $_POST["date"];
    $time = $_POST["time"];
    $place = $_POST["place"];
    $user_email = $_SESSION["login_user"];
    $_SESSION["date"]=$date;
   $_SESSION["time"]=$time;
    $sql = "INSERT INTO call_meeting (id,title, 
date, time, place, description, email)
    VALUES ('','$title', '$date', '$time', '$place', '$description','$user_email')";
    
           if (mysqli_query($db, $sql)) 
           {
           
               header("Location: add_agenda.php");
               echo "New record created successfully";
    
           }
            else
             {
             echo "Error: " . $sql . "<br>" . mysqli_error($db);
            }


          }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call Meeting</title>
    <style>
body{
  margin:0;
  padding:0;
}
html{
  margin-top:-150px;
  
}


/* Center form elements and decrease box size */
form {
  max-width: 400px;
  margin: 0 auto;
  margin-top:150px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.form-control {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

.form-select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

/* Style for button */
.create{
  background-color: #4CAF50; /* Button color */
  color: #fff; /* Text color */
  padding: 10px 20px; /* Button padding */
  border: none; /* Remove button border */
  border-radius: 4px; /* Add button border radius */
  font-size: 16px; /* Button text size */
  cursor: pointer; /* Change cursor to pointer on hover */
  transition: all 0.3s ease; /* Add button transition */
}

.create_meeting:hover {
  background-color: #3e8e41; /* Change button color on hover */
}

/* Increase size of submit button */
.create_meeting[type=submit] {
  padding: 12px 24px;
  font-size: 18px;
}
.box{
  border:1px solid #ccc;
}
label{
  margin-top:100px;
}
    </style>
</head>
<body>
<form  class="form-control" name="call_meeting" action="" method="POST">
        <br>
       <br>
          <label for="meeting_type" class="form-label" name="title">Meeting Type</label>
          <select id="meeting_type" name="meeting_type" class="form-select">
            <option vlaue=""disabled selected>Please select meeting type</option>
            <option value="meeting1">Exam Committee</option>
            <option  value="meeting2">ICPC</option>
            <option  value="meeting3">Others</option>
          </select>
          <h4 style="margin-left:30px;">Date</h4>
          <input class="form-control" type="date" name="date" placeholder="dd/mm/yyyy" > <br>
          <h4 style="margin-left:30px;">Time</h4>
          <input class="form-control" type="time" name="time" placeholder="hh:mm:am/pm" > <br>
          <h4 style="margin-left:30px;">Meeting Place</h4>
          <input class="form-control" type="text" name="place" placeholder="Eg:Conference Room" ><br>
 <input class="btn btn-primary" type="submit"   name="create_meeting" value="Create Meeting " class="create"> 

     

</form>







</body>
</html>