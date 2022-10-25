<?php
	session_start();
	include 'connect.php';
	if(isset($_POST['date_in'])) {
		$date_in = $_POST['date_in'];
		$date_in = date("Y-m-d", strtotime($date_in));
	} else {
		$date_in = date('Y-m-d');
	}
	$timestamp = strtotime($date_in);
	$day_in = date('l', $timestamp);
	if(isset($_POST['date_out'])) {
		$date_out = $_POST['date_out'];
		$date_out = date("Y-m-d", strtotime($date_out));
	} else {
		$date_out = date('Y-m-d', strtotime(date('Y-m-d').' + 3 days'));
	}
	$timestamp = strtotime($date_out);
	$day_out = date('l', $timestamp);
  $calc_days = abs(strtotime($date_out) - strtotime($date_in));
  $calc_days = floor($calc_days / (60*60*24)  );
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
  <link rel="shortcut icon" type="image/jpg" href="img/icon_bell.png"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<title>Select Your Room</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
    box-sizing: border-box;
  }
  body {
    font-family: 'Karla';
    background-color: #eef2f5;
  }
  .image {
    width: 100%;
    height: 100vh;
    background: url("img/shangrila-reception.jpg");
		background-repeat: no-repeat;
		background-size: cover;
    background-attachment: fixed;
    background-position: top;
    position: relative;
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
    background-color: #eef2f5;
  }
  .nav:hover a{
    color: #000000;
  }
  .nav:hover .nav-left div i{
    color: #d4b862;
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
  .nav-left div i{
    color: #ffffff;
  }
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

  .center-text{
    width:75%;
    background-color: transparent;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
  }
  /* .choose { */
    /* width: 60%;
    position: absolute;
    top: 280px;
    left: 20%;
    font-size: 56px;
    padding: 25px 0;
    background-color: #454B54;
    opacity: 0.9;
    color: #FFC94D;
    text-align: center; */
  /* } */

.available_choose {
    position: relative;
    width: 80%;
    margin: 50px 10%;
    /* height: 1120px; */
    font-size: 17px;
    color: #454B54;
}

.in_choose,
.out_choose {
    text-align: center;
    width: 50%;
    float: left;
    font-size: 21px;
    margin-bottom: 50px;
}

.room_card {
    float: left;
    width: 100%;
    height: 200px;
    margin-bottom: 30px;
    padding-top: 30px;
    border-top: 2px solid #454B54;
}

/* .room_card div{
  /* border-top: 1px solid #454B54;
} */

/* .room_card:last-child {
    border-bottom: 2px solid #454B54;
    padding-bottom: 30px;
} */

.room {
    width: 250px;
    height: 100%;
}

h2 {
    padding: 10px 0 20px 0;
    border-bottom: 1.5px solid black;
    letter-spacing: 0.5px;
}

h3,
h4 {
  margin-left: 30px;
}

h3 {
  font-size: 40px;
}

h4 {
    margin-top: 30px;
    font-size: 24px;
}

.choose_buttons {
    display: flex;
    flex-direction: column;
    width: 80%;
    margin: auto;
    margin-bottom: 50px;
    border-top: 2px solid #454B54;
}

.choose_button {
    padding: 20px;
    width: 80%;
    margin-bottom: 20px;
    font-size: 32px;
    text-align: center;
    color: #454B54;
    margin: auto;
}

.click-button {
    width: 16%;
    font-size: 20px;
    margin-left: 5%;
    padding: 6px 12px;
    border: 2px solid #454B54;
    background-color: #EEEEEE;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    color: #666;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease-out;
}

.click-button:first-of-type {
    margin-left: 0;
}

.click-button:hover {
    color: #ffffff;
    background-color: #454B54;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
}

.click-button:active {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset;
}

.close {
    position: absolute;
    top: 57px;
    left: 600px;
    color: #FFC94D;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    /* padding-top: 30px; */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 28%;
    height: auto;
}

.input_field {
  width: 90%;
  margin-top: 5px;
  font-size: 17px;
  padding: 5px 0 5px 10px;
  border: 1.5px solid #454b54;
  border-radius: 8px;
  outline: none;
  background-color: #ffffff !important;
}

.input_field:focus, .input_field:active, .input_field:visited {
  outline: inherit;
  background-color: #ffffff !important;
}

.noclick {
  pointer-events: none;
}

.submit {
  font-size: 17px;
  border: 2px solid #454b54;
  background-color: #454b54;
  border-radius: 8px;
  box-shadow: 0 1px 3px rgb(0 0 0 / 15%);
  margin-top: 8px;
  margin-left: 5px;
  padding: 8px 20px;
  cursor: pointer;
  transition: 0.3s;
  color: #ffffff;
  outline: none;
}

.submit:hover {
    border-color: #454b54;
    background-color: #ffffff;
    color: #454b54;
}

.cancel {
  color: #ffffff;
  border: 2px solid #454b54;
  background-color: #454b54;
}

.cancel:hover {
  background-color: #ffffff;
  color: #454b54;
}
.footer-class{
  margin: auto;
  width: 100%;
  text-align: center;
  background: #454b54;
  height: 100px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #ffffff;
}
/* .footer-two p a {
            color: #ffffff;
        } */
        
.footer-class p a:hover {
  color: gray;
}
</style>
<body>
  <div class="image">
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
    <!-- <div class="container-lg my-3" style="width: 100%; height: 80%; display: flex; justify-content: center;align-items: center;">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 60%; margin: auto;"> -->
        <!-- Carousel indicators -->
        <!-- <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        </ol> -->
        
        <!-- Wrapper for carousel items -->
        <!-- <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/room_single.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some demonstrative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/room_twin.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some demonstrative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/room_family.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some demonstrative placeholder content for the third slide.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/room_deluxe.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some demonstrative placeholder content for the third slide.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/room_suite.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some demonstrative placeholder content for the third slide.</p>
                </div>
            </div>
        </div> -->

        <!-- Carousel controls -->
        <!-- <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
  </div> -->
  </div>

  <div class="available_choose">
    <form method="POST" action="">
      <div class="in_choose">
        <label style="color:#FFC94D; font-size: 30px;">Selected Check-In Date: </label><br/><br/>
        <b style="font-size:32px; color:#454B54;"><?php echo "".$day_in.", ".$date_in."."; ?></b>
      </div>
      <div class="out_choose">
        <label style="color:#FFC94D; font-size: 30px;">Selected Check-Out Date: </label><br/><br/>
        <b style="font-size:32px; color: #454B54;"><?php echo "".$day_out.", ".$date_out."."; ?></b>
      </div>
    </form>
		<!--<h4 style="margin-top:50px;margin-bottom:30px" class="choose_button">We have different type of rooms for you</h4>-->
    <?php
			$query = "SELECT * FROM room_categories";
      $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)) {
		?>

    <div class="room_card" method="POST" action="">
      <div style="display: flex; width: 100%;">
        <div style="width: 25%; height: 169px;">
          <img src="img/<?php echo $row['cover_img'] ?>" class="room">
        </div>
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: flex-start; color: #454B54; width: 28%; height: 169px;">
          <h3 style="color: #454B54;"><b><?php echo $row['name'] ?></b></h3>
  		    <h4 style="color: #454B54;"><b><?php echo '$ '.number_format($row['price'],2) ?></b><span> per day</span></h4>
        </div>
        <div style="border-left: 1px solid #454b54; width: 30%; height: 169px;">
          <ul>
            <li><?php echo $row['room_size'] ?></li>
            <li><?php echo $row['room_view'] ?></li>
            <li><?php echo $row['bed_size'] ?></li>
          </ul>
        </div>
        <div style="width: 15%; margin-left: 15px; margin-left: 15px; display: flex; justify-content: center; align-items: flex-end;">
          <button style="width: 100%;" class="click-button" id="myBtn<?php echo $row['id'] ?>">Choose</button>
        </div>
      </div>
    </div>
		<?php } ?>
  </div>
        
  <div class="choose_buttons">
    <!-- <h4 class="choose_button">Choose a room</h4>
        <div style="display: flex;">
          <button class="click-button" id="myBtn1">Single Room</button>
          <button class="click-button" id="myBtn2">Twin Room</button>
          <button class="click-button" id="myBtn3">Deluxe Room</button>
          <button class="click-button" id="myBtn4">Family Room</button>
          <button class="click-button" id="myBtn5">Suite Room</button>
        </div> -->
	</div>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <!--<span class="close">&times;</span>-->
      <h2>Fill your information</h2>

      <form method="POST" action="card.php">
        <div class="room_final">
          <br/><label for="name">Your name</label><br/>
          <input type="text" name="name" class="input_field" required><br/><br/>
        </div>
        <div class="form-group">
          <label for="contact">Contact number</label><br/>
          <input type="text" name="contact" class="input_field" required><br/><br/>
        </div>
        <div class="form-group">
          <label for="date_in">Arrival</label><br/>
          <input type="text" name="date_in" onfocus="(this.type = 'date')" class="input_field noclick" value="<?php echo $date_in; ?>" readonly><br/><br/>
        </div>
        <div class="form-group">
          <label for="date_out">Departure</label><br/>
					<input type="text" name="date_out" onfocus="(this.type = 'date')" class="input_field noclick" value="<?php echo $date_out; ?>" readonly><br/><br/>
        </div>
        <p>Days of Stay: <b><?php echo $calc_days ?></b></p>
        <input type="submit" class="submit" name="submit" value="Save">
				<span class="submit cancel" id="cancel">Cancel</span>
      </form>
    </div>
  </div>

	<footer>
    <div class="footer-class">
            <p style="margin:0px">
                <a href="">Privacy Policy</a> |
                <a href="">Terms & Conditions</a> |
                <a href="">Safety & Security</a> |
                <a href="">Supplier Code Of Conduct</a>
            </p>
            <p style="margin:0px">© 2022 Royal International Hotel Management Ltd. All Rights Reserved. ICP license: 17055189
            </p>
    </div>
    <div class="footer-three" style="height: 50px; background-color: #454b54;"></div>

	</footer>

  <script>
    var modal = document.getElementById("myModal");
    var btn1 = document.getElementById("myBtn1");
    var btn2 = document.getElementById("myBtn2");
		var btn3 = document.getElementById("myBtn3");
		var btn4 = document.getElementById("myBtn4");
		var btn5 = document.getElementById("myBtn5");
    var span = document.getElementsByClassName("cancel")[0];

    btn1.onclick = function() {
      modal.style.display = "block";
    }
    btn2.onclick = function() {
      modal.style.display = "block";
    }
		btn3.onclick = function() {
      modal.style.display = "block";
    }
    btn4.onclick = function() {
      modal.style.display = "block";
    }
		btn5.onclick = function() {
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

		$(document).ready(function () {
			$('.click-button').on('click',function () {
				var button_id = $(this).attr('id');
				if(button_id == 'myBtn1') {
					createCookie("height", "1");
				} else if(button_id == 'myBtn2') {
					createCookie("height", "2");
				} else if(button_id == 'myBtn3') {
					createCookie("height", "3");
				} else if(button_id == 'myBtn4') {
					createCookie("height", "4");
				} else if(button_id == 'myBtn5') {
					createCookie("height", "5");
				}
      });
		});

		function createCookie(name, value) {
			document.cookie = name + "=" + value;
		}
  </script>
</body>
</html>
