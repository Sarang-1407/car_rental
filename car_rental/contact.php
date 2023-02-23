<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Wheel Deal</title>
	<meta charset="utf-8">
	<meta name="author" content="Sarang">
	<meta name="description" content="Just some random jibberish...don't mind me"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Experience the pleasure of Self-drive</h2>
				<h3 class="properties" style="text-align: center">Comfortable &nbsp; ◙ &nbsp; Luxurious &nbsp; ◙ &nbsp; Affordable</h3>
			</section>
	</section><br><br><!--  end hero section  -->



		<div class="wrapper">
		<h2 style="text-align: center">Contact Us</h2>
        <h3 style="text-align: center">We will get back to you asap!</h3>
			<ul class="properties_list">
			<form method="post">
				<table>
                    <tr>
						<td style="color: #003300; font-weight: bold; font-size: 18px">Full Name:</td>
					</tr>
                    
                    <tr>
						<td>
							<textarea name="message" class="txt" rows="1" cols="50" ></textarea>
						</td>
					</tr>
                    <tr>
						<td>&nbsp;</td>
					</tr>
                    <tr>
						<td style="color: #003300; font-weight: bold; font-size: 18px">E-mail:</td>
					</tr>
                   
                    <tr>
						<td>
							<textarea name="message" class="txt" rows="1" cols="50" ></textarea>
						</td>
					</tr>
                    <tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="color: #003300; font-weight: bold; font-size: 18px">Message:</td>
					</tr>
					
					<tr>
						<td>
							<textarea name="message" class="txt" rows="10" cols="50" ></textarea>
						</td>
					</tr>
                    <tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><input type="submit" name="send" value="SUBMIT"></td>
					</tr>
				</table>
			</form>
				<?php
					if(isset($_POST['send'])){
						include 'includes/config.php';
						
						$message = $_POST['message'];
						
						$qry = "INSERT INTO message (message,client_id,time,status)
							VALUES('$message','$_SESSION[email]',NOW(),'Unread')";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Message Successfully Delivered\");
											window.location = (\"success.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Message Not Delivered. Try Again\");
											window.location = (\"message_admin.php\")
											</script>";
							}
					}
				?>
			</ul>
		</div>
	

	<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li>OUR COMPANY</li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li>OTHERS</li>
						<li><a href="#">Sedans</a></li>
						<li><a href="#">SUVs</a></li>
						<li><a href="#">Hatchbacks</a></li>
						<li><a href="#">Minivans</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li>OUR CAR TYPES</li>
						<li><a href="#">Maruti</a></li>
						<li><a href="#">Mahindra</a></li>
						<li><a href="#">Toyota</a></li>
						<li><a href="#">Others.</a></li>
					</ul>
				</li>

				<?php include_once "includes/footer.php"; ?>