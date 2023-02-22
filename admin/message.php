<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Message</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
  .left_box
  {
    height: 600px;
    width: 500px;
    float: left;
    background-color: #8ecdd2;
    margin-top: -20px;
  }
  .left_box2
  {
    height: 600px;
    width: 300px;
    background-color: #537890;
    border-radius: 20px;
    float: right;
    margin-right: 30px;
  }
  .left_box input
  {
    width: 150px;
    height: 50px;
    background-color: #537890;
    padding: 10px;
    margin: 10px;
    border-radius: 10px;
  }
  .list
  {
    height: 500px;
    width: 300px;
    background-color: #537890;
    float: right;
    color: white;
    padding: 10px;
    overflow-y: scroll;
    overflow-x: hidden;
  }
  .right_box
  {
    height: 600px;
    width: 970px;
    background-color: #8ecdd2;
    margin-left: 380px;
    margin-top: -20px;
    padding: 10px;
  }
  .right_box2
  {
    height: 600px;
    width: 660px;
    margin-top: -20px;
    padding: 20px;
    border-radius: 20px;
    background-color: #537890;
    float: left;
    color:white;
  }
  tr:hover
  {
    background-color: #1e3f54;
    cursor: pointer;
  }
  .form-control
{
  height: 47px;
  width: 78%;
}
.msg
{
  height: 450px;
  overflow-y: scroll;
}
.btn-info
{
  background-color: #02c5b6;
}
.chat
{
  display: flex;
  flex-flow:row wrap;
}
.user .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #821b69;
  color: white;
  border-radius: 10px;
}
.admin .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #423471;
  color: white;
  border-radius: 10px;
  order: -1;
}
</style>

<body style="width: 1348px; height: 595px;">
<?php
  //  $sql1=mysqli_query($db,"SELECT message.email FROM registration INNER JOIN message ON registration.email=message.email group by email ORDER BY status ;");
  $sql1=mysqli_query($db,"SELECT message.email, registration.status FROM registration
  INNER JOIN message ON registration.email=message.email
  GROUP BY message.email, registration.status
  ORDER BY registration.status;
  ");
?>
<!-----------------------Left box-------------------->
<div class="left_box">
  <div class="left_box2">
    <div style="color: #fff;">
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="email" id="uname">
        <button type="submit" name="submit" class="btn btn-default">SHOW</button>
      </form>
    </div>
    <div class="list">
      <?php
        echo "<table id='table' class='table' >";
        while ($res1=mysqli_fetch_assoc($sql1)) 
        {
          echo "<tr>";
            //  echo "<td width=65>"; echo "<img class='img-circle profile_img' height=60 width=60 src='images/".$res1['pic']."'>"; 
            //   echo "</td>";

            echo "<td style='padding-top:30px;'>"; echo $res1['email']; echo "</td>";

          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</div>
<!-----------------------Right box-------------------->
<div class="right_box">
  <div class="right_box2">
    <?php
    /*--------------if submit is pressed-----------*/
      if(isset($_POST['submit']))
      {
        $res=mysqli_query($db,"SELECT * from message where email='$_POST[email]' ;");
        mysqli_query($db,"UPDATE message SET status='yes' where sender='user' and email='$_POST[email]' ;");

        if($_POST['email'] != '')
        {
          $_SESSION['email']=$_POST['email'];
        }

      ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['email'] ?> </h3>
        </div>
  <!---------show message----------->
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='user')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <!-- <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/p.jpg"> -->
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <!-- <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?> -->
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
        
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>
      <?php
      }
     /*--------------if submit is not pressed-----------*/
     else
     {
       if($_SESSION['email']=='')
       {
        
          //  <img style="margin: 100px 80px; border-radius: 50%;" src="images/tenor.gif" alt="animated"> 
         
       } else {
        if (isset($_POST['submit1'])) {
          mysqli_query($db, "INSERT into message VALUES ('', '$_SESSION[email]','$_POST[message]','no','admin');");

          $res = mysqli_query($db, "SELECT * from message where email='$_SESSION[email]' ;");
        } else {
          $res = mysqli_query($db, "SELECT * from message where email='$_SESSION[email]' ;");
        }
      }
        ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['email'] ?> </h3>
        </div>
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='user')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <!-- <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/p.jpg">&nbsp -->
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <!-- <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?> -->
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>

        <?php

      }
     
    ?>
  </div>
</div>

<script>
  var table = document.getElementById('table'),eIndex;
  for(var i=0; i< table.rows.length; i++)
  {
    table.rows[i].onclick =function()
    {
      rIndex = this.rowIndex;
      document.getElementById("uname").value = this.cells[1].innerHTML;
    }
  }
</script>
</body>
</html>
