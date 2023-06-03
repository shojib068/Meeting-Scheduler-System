<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tofsil - A Meeting Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .navbar-brand img{
      width: 250px;
      height: auto;
      display: inline-block;
    }
    .navbar-brand {
  display: block;
  margin: 0 auto;
}

@media (max-width: 768px) {
  .navbar-brand {
    text-align: center;
  }
}
img {
  transition: transform 0.3s ease-in-out;
}

img:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.list {
  display: flex;
  justify-content: center;
 
}

.list ul {
  list-style: none;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
  padding: 0;
  
}

.list li {
  margin: 0 10px;
  color: black;
  font-size: 35px;
}

.list li a {
  display: block;
  cursor: pointer;
  text-decoration: none;
  color: black;
  transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out;
}

.list li a:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  color: blue;
  
}
.email {
  display: flex;
  align-items: center;
  text-align: center;
}

.email i {
  margin-right: 5px;
  text-align: center;
}

.email a {
  text-decoration: none;
}

footer
	{
		height: 200px;
		width: 1361px;
	}
		.fa
		{
			margin: 0px 5px;
			padding: 5px;
			font-size: 20px;
			width: 20px;
			height: 20px;
			text-align: center;
			text-decoration: none;
			border-radius: 50%;
		}
		.fa:hover
		{
			opacity: .7;
		}
		.fa-facebook
		{
			background: #3B5998;
			color: black;
		}
		.fa-twitter
		{
			background: #55ACEE;
			color: black;
		}
		.fa-google
		{
			background: #dd4b39;
			color: black;
		}
		.fa-instagram
		{
			background: #125688;
			color: black;
		}
		.fa-yahoo
		{
			background: #400297;
			color: black;
		}


  </style>
</head>
<body>
  <header class="container-fluid ">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand " href="index.php">
          <img src="images/logo.png" alt="Tofsil Logo"  >
          
        </a>
        
      </nav>
    </div>
  </header>
  <div class="list">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user/registration.php">Sign-Up</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
  </div>
  <main class="container">
    <section class="jumbotron mt-3">
      <h1 class="display-4">Tofsil</h1>
      <p class="lead">Effortlessly manage your meetings with our intuitive meeting management system.</p>
      <a class="btn btn-primary btn-lg" href="registration.php" role="button">Sign Up Now</a>
    </section>
  </main>
  <footer class="container-fluid  text-light">
  
  <h3 style="color:blue;text-align: center;">Contact us through social media</h3><br>

<div style="margin:0px 570px;">

  <a href="#" class="fa fa-facebook"></a>
  <a href="#" class="fa fa-twitter"></a>
  <a href="#" class="fa fa-google"></a>
  <a href="#" class="fa fa-instagram"></a>
  <a href="#" class="fa fa-yahoo"></a>
</div>

<br>
<p style="color:blue">
  <br>
  <div class="email">
  <i class="fas fa-envelope"></i>
  <a href="#">tofsil@gmail.com</a>
</div>
  Mobile:&nbsp &nbsp +880171*******
</p>
    <div class="container">
      <p class="text-center">© 2023 Tofsil. All rights reserved.</p>

    </div>
   
  </footer>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>
