<?php
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Meeting Management System
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <style>
		body {
			background-color: #F5F5F5;
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			color: #333;
		}

		header {
			background-color: #004528;
			padding: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		.logo h1 {
			margin: 0;
			font-size: 28px;
			color: white;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		nav {
			background-color: #333;
			padding: 10px 20px;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-wrap: wrap;
		}

		nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		nav li {
			margin: 0 10px;
		}

		nav a {
			color: white;
			text-decoration: none;
			font-weight: bold;
			font-size: 18px;
			padding: 10px;
			transition: all 0.3s ease;
		}

		nav a:hover {
			background-color: #4CAF50;
		}

		.box {
			background-color: #fff;
			padding: 20px;
			text-align: center;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			margin: 100px auto;
			max-width: 500px;
			border-radius: 5px;
		}

		footer {
			background-color: #004528;
			padding: 20px;
			text-align: center;
			color: white;
			font-size: 14px;
			margin-top: 100px;
		}
	</style> -->
</head>


<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<h1 >MEETING LIBRARY MANAGEMENT SYSTEM</h1>
		</div>
		<?php
		if(isset($_SESSION['login_user']))
		{?>
			<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					
					<ul class="nav navbar-nav">
    <li><a href="profile.php">PROFILE</a></li>
   </ul>
					<li>
                        <a href="logout.php">LOGOUT</a></li>
                        <a href="feedback.php">FEEDBACK</a></li>
				</ul>
			</nav>
			<?php
		}
		else
		{?>
<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="registration.php">SIGN-UP</a></li>
					<li>
                        <a href="user_login.php">USER-LOGIN</a></li>
                        <!-- <a href="feedback.php">FEEDBACK</a></li> -->
				</ul>
			</nav>
		<?php
		}
		?>
			
		</header>
		<section>
		<div class="sec_img">
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 >Welcome To </h1><br><br>
				<h1 >TOFSIL</h1><br>
				<h1 >A Meeting Management System </h1><br>
			</div>
		</div>
		</section>
		<footer>
			<p >
				<br><br>
				Email: Online.meeting@gmail.com <br>
				Mobile: +88018********
			</p>
		</footer>
	</div>
	<?php include "footer.php"; 
	?>
</body>

</html>