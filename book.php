<?php
	session_start();
	include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/jpg" href="img/icon_success.png"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<title>Your Reservation is Confirmed</title>
</head>
<style>
	body{
		width: 100%;
		color: #ffffff;
		/* text-shadow: 2px 2px #abcdef; */
	}
	.alert-container{
		background: url("img/Final-img.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		position: relative;
		text-align: center;
		width: 100%;
    	height: 100vh;
	}
.alert {
	width: 100%;
	height: 82%;
	background-color: #00000050;
	position: relative;
}
.alert-text{
	width: 100%;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-shadow: 3px 3px #000000;
}
h1, h2 {
	text-align: center;
}
h1 {
	font-size: 64px;
	padding: 10px;
}
h2 {
	font-size: 26px;
	border: 0;
	padding: 5px;
}
h2:last-child {
	font-size: 19px;
}
.big {
	font-size: 32px;
	padding-left: 10px;
}
a {
	border-bottom: 1px solid white;
}
.book-footer{
	width: 100%;
    height: 18%;
    background-color: white;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.social, .contact-us{
	color: #000000;
	width: 25%;
    height: 100px;
    /* background-color: bisque; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.social p, .contact-us p{
	font-size: 25px;
}
.social-icons{
	width: 100% !important;
    height: auto !important;
}
.social div {
	width: 50px;
    height: 50px;
    font-size: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.social div a{
	text-decoration: none !important;
}
.social div a i, .contact-us p div i{
	color: black;
}
</style>
<body>
	<div class="alert-container">
	<?php
	if (isset($_POST['submit'])) {
		$name= $_SESSION["name"];
		$contact = $_SESSION["contact"];
		$dateIn = $_SESSION["date_in"];
		$dateOut = $_SESSION["date_out"];
		$room_cat = $_COOKIE["height"];
		$ref = rand(123456789,999999999);
		$success = false;
		$norooms = false;

		$que = "SELECT id, room FROM rooms WHERE category_id = $room_cat AND status = '0' LIMIT 1";
		$result = mysqli_query($dbc, $que);
		while($row = mysqli_fetch_array($result)) {
			$room_id = $row['id'];
			$room = $row['room'];
			$query = "INSERT INTO check_in (ref, room_id, name, contact, date_in, date_out, room, exp_date) VALUES ('$ref', '$room_id', '$name', '$contact', '$dateIn', '$dateOut', '$room', '$dateOut')";
			$result2 = mysqli_query($dbc,$query) or die('Error querying database.');
			$query = "UPDATE rooms SET status = '1' WHERE id = $room_id";
			$update = mysqli_query($dbc,$query) or die('Error querying database.');
			$success = true;
			$norooms = true;
		}

		echo "<div class='alert'>";
		echo "<div class='alert-text'>";
		if($success==true) {
			echo "<h1>YOUR RESERVATION IS CONFIRM!</h1>";
			echo "<h2>We got your reservation and we can't wait to see you soon.</h2>";
			echo "<h2>Your reservation number is: <span class='big'>" .$ref. "</span></h2>";
			echo "<h2>If you want to go back to our main page, <a href='index.php'>click here</a>.</h2>";
		} else if($norooms==false) {
			echo "<h1>WE ARE SO SORRY!</h1>";
			echo "<h2>We just found out that we don't have any available room of your selected room type.</h2>";
			echo "<h2 style='font-size: 22px'>Please try a different type of room or contact us to resolve this problem.</h2>";
			echo "<h2>If you want to go back to our main page, <a href='index.php'>click here</a>.</h2>";
		} else {
			echo "<h1>Something went wrong!</h1>";
			echo "<h2>Please contact us by email or phone.</h2>";
		}
		echo "</div>";
		echo "</div>";
	} else {
		header('Location: index.php');
	}
	?>
		<div class="book-footer">
			<div class="social">
				<p>Follow Us</p>
				<div class="social-icons">
					<div><a href="#facebook"><i class="fa-brands fa-facebook"></i></a></div>
					<div><a href="#twitter"><i class="fa-brands fa-twitter"></i></a></div>
					<div><a href="#instagram"><i class="fa-brands fa-instagram"></i></a></div>
				</div>
			</div>
			<div class="contact-us">
				<p>If you have any problem,</p>
				<p>Call us 123-456-789</p>
			</div>		
		</div>
	</div>
</body>
</html>
