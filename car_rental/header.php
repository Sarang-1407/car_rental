<?php
	session_start();
	error_reporting(E_NOTICE);
?>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<header>	
			<div class="wrapper">
					<h1 class="logo">The Wheel Deal &nbsp;</h1>
					<a href="www.google.com" class="hamburger"></a>
					<a href="index.php"><img src="img/main.png" class="main">
				<nav>
					<?php
						if(!$_SESSION['email'] && (!$_SESSION['pass'])){
					?>
					<ul>
						<li><a href="index.php"><strong>Home<strong></a></li>
						<li><a href="index.php"><strong>Rentals<strong></a></li>
						<li><a href="about.php"><strong>About<strong></a></li>
						<li><a href="contact.php"><strong>Contact<strong></a></li>
					</ul>
					<a href="account.php">Client Login</a>&ensp;
					<a href="login.php">Admin Login</a>
					<?php
						} else{
					?>
							<ul>
								<li><a href="index.php"><strong>Home<strong></a></li>
								<li><a href="status.php"><strong>View Status<strong></a></li>
								<li><a href="message_admin.php"><strong>Message Admin<strong></a></li>
							</ul>
					<a href="admin/logout.php">Logout</a>
					<?php
						}
					?>
				</nav>
			</div>
		</header>