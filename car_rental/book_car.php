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
	</section><!--  end hero section  -->

	
	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'includes/config.php';
						$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
						$rs = $conn->query($sel);
						$rws = $rs->fetch_assoc();
			?>
				<li>
					<a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo '₹'.$rws['hire_cost'];?>/day</span>
					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo ''.$rws['car_type'];?></a>
						</h1>
						<h2>Vehicle Model: <span class="property_size"><?php echo $rws['car_name'];?></span></h2>
						<h2>Vehicle Number: <span class="car_no"><?php echo $rws['car_no'];?></span></h2>
					</div>
				</li>
				<h3>Fancy a <?php echo $rws['car_name'];?>? </h3>
				<?php
					if(!$_SESSION['email'] && (!$_SESSION['pass'])){
				?>
				<form method="post">
					<table>
					<br><tr>
							<td>Full Name:</td>
							<td><input type="text" name="fname" required></td>
						</tr>
						<tr>
							<td><br>Phone Number:</td>
							<td><br><input type="tel" name="phone" pattern="[0-9]{10}" required></td>
						</tr>
						<tr>
							<td><br>Email Address:</td>
							<td><br><input type="email" name="email" required></td>
						</tr>
						<tr>
							<td><br>ID Number:</td>
							<td><br><input type="text" name="id_no" required></td>
						</tr>
						<tr>
							<td><br>Gender:</td>
							<td><br>
								<select name="gender">
									<option> Select Gender </option>
									<option> Male </option>
									<option> Female </option>
									<option> Intersex </option>
								</select>
							</td>
						</tr>
						<tr>
							<td><br>Location:</td>
							<td><br><input type="text" name="location" required></td>
						</tr>
						<tr>
							<td><br>Trip Date:</td>
							<td><br><input type="date" name="date_from" required> - <input type="date" name="date_to" required></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><br><input type="submit" name="save" value="Rent Car"></td>
						</tr>
					</table>
				</form>
				<?php
					} else
						{
							?>
								<a href="pay.php">Rent Car</a>
							<?php
						}
				?>
				<?php
						if(isset($_POST['save'])){
							include 'includes/config.php';
							$fname = $_POST['fname'];
							$id_no = $_POST['id_no'];
							$gender = $_POST['gender'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$location = $_POST['location'];
							$date_from = $_POST['date_from'];
							$date_to = $_POST['date_to'];
							
							$qry = "INSERT INTO client (fname,id_no,gender,email,phone,location,date_from,date_to,car_id,status)
							VALUES('$fname','$id_no','$gender','$email','$phone','$location','$date_from','$date_to','$_GET[id]','Pending')";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered. Proceed to pay\");
											window.location = (\"pay.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"book_car.php\")
											</script>";
							}
						}
						
					  ?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

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