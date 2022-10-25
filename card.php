<?php
session_start();
include 'connect.php';
$calc_days = abs(strtotime($_POST['date_out']) - strtotime($_POST['date_in']));
$calc_days = floor($calc_days / (60 * 60 * 24));
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link rel="shortcut icon" type="image/jpg" href="img/icon_bell.png" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<title>Hotel Managment System</title>
</head>
<style>
	*{
		margin: 0;
		padding: 0;
		scroll-behavior: smooth;
		box-sizing: border-box;
  	}
  	body {
    	font-family: 'Karla';
    	background-color: #EEEEEE;
		/* display: flex;
		flex-flow: row nowrap;
		align-items: center;
		justify-content: center;
		font-family: "Karla"; */
  	}
  	.bg {
    	width: 100%;
    	height: 100vh;
    	background-color: #49535d;
		display: flex;
		flex-direction: column;
    	text-align: center;
	}
    .nav{
		width: 100%;
		height: auto;
		font-family: 'Josefin Sans';
		background-color: transparent;
		border-bottom: 1px solid #ffffff;
		padding: 5px;
		transition: 0.5s;
		display: flex;
		justify-content: space-around;
	}
	.nav:hover{
		background-color: white;
	}
	.nav:hover a{
		color: #000000;
	}
	.nav:hover .nav-left div i{
		color: #d4b862;
	}
	.nav-left div i{
		color: #ffffff;
	}
	.nav-left{
		width: 300px;
		display: flex;
		align-items: center;
	}
	.nav-left div{
		font-size: 30px;
		margin-right: 10px;
	}
	/* .nav-left div i{
		color: #ffffff;
	} */
	.nav-right{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	a {
		text-decoration: none;
		color: white;
		transition: 0.3s;
	}
	a.name {
		font-family: 'Dancing Script';
		font-weight: bold;
		font-size: 46px;
	}

	a.about,
	a.book {
		float: right;
		font-size: 16px;
		margin-left: 17px;
		padding: 3px;
	}

	a.book {
		font-size: 18px;
		border: 2px solid #454B54;
		border-radius: 8px;
		margin-top: 5px;
		padding: 10px 10px 6px 10px;
	}

	a.book:hover {
		background-color: #454B54;
		color: white;
	}
	.container{
		width: 100%;
		height: inherit;
		position: relative;
		text-align: center;
		color: white;
	}
	.image{
		width: 350px;
    	height: 350px;
    	background: url(img/receipt.jpg);
    	background-size: cover;
    	background-repeat: no-repeat;
		position: absolute;
		top: 50%;
		left: 35%;
		transform: translate(-50%, -50%);
	}
	.receipt{
		width: 450px;
		height: 450px;
		background-color: #ffffff;
		position: absolute;
		top: 50%;
		left: 60%;
		transform: translate(-50%, -50%);
		color: #000000;
		text-align: left;
    	padding: 45px;
	}
	.receipt h1{
		padding: 5px 0px;
		border-top: 1px solid #454B54;
		border-bottom: 1px solid #454B54;
		margin-bottom: 5px;
		text-align: center;
	}
	.receipt h3{
		color: #454B54;
		margin-bottom: 15px;
		text-align: center;
	}
	.receipt p{
		margin-bottom: 10px;
	}
	.gray{
		color: #454B54;
	}
	.bold{
		font-weight: bold;
		float: right;
	}
	.reservation-btn{
		margin-top: 20px;
		width: 150px;
		height: auto;
		padding: 10px;
		border: 2px solid #454b54;
		outline: none;
		float: right;
		background-color: #454b54;
		font-size: 15px;
		color: #ffffff;
		transition: 0.5s;
		font-weight: bold;
		cursor: pointer;
		margin-left: 10px;
	}
	.reservation-btn:hover {
		background-color: #ffffff;
		color:#454b54;
	}
</style>

<body>
	<div class="bg">
    	<div class="nav">
      		<div class="nav-left">
        		<div><i class="fa-regular fa-chess-queen"></i></div>
        		<a class="name" href="index.php">Royal</a>
      		</div>
        	<div class="nav-right">
				<a class="about "href="index.php">HOME</a>
				<a class="about" href="about.html">ABOUT US</a>
				<a class="about" href="contact.php">CONTACT US</a>
				<a class="about" href="facilities.html">FACILITIES</a>
      		</div>
    	</div>
		<?php
			if (isset($_POST['submit'])) {
				$_SESSION['name'] = $_POST['name'];
				$_SESSION['contact'] = $_POST['contact'];
				$_SESSION['date_in'] = $_POST['date_in'];
				$_SESSION['date_out'] = $_POST['date_out'];
				$room_cat = $_COOKIE["height"];
				if ($room_cat == 1) {
					$price = 120;
				} else if ($room_cat == 2) {
					$price = 200;
				} else if ($room_cat == 3) {
					$price = 350;
				} else if ($room_cat == 4) {
					$price = 400;
				} else if ($room_cat == 5) {
					$price = 650;
				}
			} else {
			}
		?>
		<div class="container">
			<!-- <div class="container-div"> -->
				<div class="image"></div>
				<div class="receipt">
					<h1>Reservation Receipt</h1>
					<h3>Please check your information</h3>
					<p>
						<span class="gray">Name</span> 
						<span class="bold"><?php echo $_POST['name'] ?></span>
					</p>
					<p style="border-bottom: 1px solid #454B54; padding-bottom: 10px;">
						<span class="gray">Contact</span>
						<span class="bold"><?php echo $_POST['contact'] ?></span>
					</p>
					<p>
						<span class="gray">Arrival</span> 
						<span class="bold"><?php echo $_POST['date_in'] ?></span>
					</p>
					<p style="border-bottom: 1px solid #454B54; padding-bottom: 10px;">
						<span class="gray">Departure</span> 
						<span class="bold"><?php echo $_POST['date_out'] ?></span>
					</p>
					<p><span class="gray">Room:</span> <span class="bold"><?php if ($room_cat == 1) {
										echo "Single Room";
									} else if ($room_cat == 2) {
										echo "Twin Room";
									} else if ($room_cat == 3) {
										echo "Deluxe Room";
									} else if ($room_cat == 4) {
										echo "Family Room";
									} else if ($room_cat == 5) {
										echo "Suite Room";
									} ?></span></p>
					<p style="padding-bottom: 10px;">
						<span class="gray">Room Charges</span> 
						<span class="bold"><?php echo '$' . number_format($price * $calc_days, 2) ?>
						</span>
					</p>
					<form method="POST" action="book.php">
						<input type="submit" name="submit" value="Make Reservation" class="reservation-btn">
					</form>
					<form method="POST" action="index.php">
						<input type="submit" name="cancel" value="Back" class="reservation-btn" style="width: 100px">
					</form>
				</div>
			<!-- </div> -->
		</div>

    </div>

	<!-- <main id="main">
		<section id="left">
			<h1>Reservation summary</h1>
			<h3>Please check if everything is correct!</h3>
			<p><b>Name:</b> <?php echo $_POST['name'] ?></p>
			<p><b>Contact:</b> <?php echo $_POST['contact'] ?></p>
			<p><b>Check-in Date:</b> <?php echo $_POST['date_in'] ?></p>
			<p><b>Check-out Date:</b> <?php echo $_POST['date_out'] ?></p>
			<p><b>Room:</b> <?php if ($room_cat == 1) {
								echo "Single Room";
							} else if ($room_cat == 2) {
								echo "Twin Room";
							} else if ($room_cat == 3) {
								echo "Deluxe Room";
							} else if ($room_cat == 4) {
								echo "Family Room";
							} else if ($room_cat == 5) {
								echo "Suite Room";
							} ?></p>
			<p><b>Price for Your Stay:</b> <?php echo '$' . number_format($price * $calc_days, 2) ?></p>
		</section>
		<section id="right">
			<form method="POST" action="book.php">

				<input type="submit" name="submit" value="Make Your Reservation">
			</form>
		</section>
	</main> -->
</body>

</html>