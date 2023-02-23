
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

	
        
        
        <form action="sort.php" method="post" style="text-align: right; color: #000099; font-weight:bold">
        <label for="sort-by">Sort By:</label>
        <select id="sort-by" name="sort-by">
            <option value="price_asc">Price (Low-High)</option>
            <option value="price_desc">Price (High-Low)</option>
            <option value="capacity_asc">Capacity (Low-High)</option>
            <option value="capacity_desc">Capacity (High-Low)</option>
        </select>
        <button type="submit">Sort</button>
        </form><br>

		<section class="listings">
		<div class="wrapper">
        
			<ul class="properties_list">
			<?php
						include 'includes/config.php';
						$sel = "SELECT * FROM cars WHERE status = 'Available'";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
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
						<h2>Vehicle Capacity: <span class="capacity"><?php echo $rws['capacity'];?></span></h2>
					</div>
				</li>
			<?php
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
						<li><a href="about.php">About Us</a></li>
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