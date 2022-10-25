<?php
	session_start();
	include 'connect.php';
  /*$date_in = date("l, d.m.Y");
  $date_out = date('l, d.m.Y',strtotime(date('l, d.m.Y').' + 3 days'));
  $_SESSION['date_in'] = $date_in;
  $_SESSION['date_out'] = $date_out;*/
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<title>Royal Hotel</title>
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
    background-color: #EEEEEE;
  }
  .image {
    width: 100%;
    height: 100vh;
    background: url("img/shangri-la.jpg");
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
    background-color: white;
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
  .available {
      position: absolute;
      bottom: 60px;
      width: 80%;
      left: 10%;
      padding: 15px 0;
      background-color: #EEEEEE;
      border-radius: 8px;
      font-weight: 600;
      text-align: center;
  }

  .available-container{
    width: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .available .in input, .available .out input {
    width: 50%;
    height: 40px;
    padding: 5px 10px;
    cursor: pointer;
    text-align: center;
    outline: none;
    /* border: none; */
    margin-left: 10px;
    border: 1px solid #49535d;
    border-radius: 10px;
  }

  .available input:focus {
      outline: none;
  }

  .in label,
  .out label {
      color: #49535d;
      font-weight: bold;
      font-size:20px
  }

  .in, .out, .check{
    width:30%;
  }

  .check input {
    width: 180px;
    background-color: #49535d;
    outline: none;
    border: none;
    height: 40px;
    font-family: 'Karla';
    font-size: 15px;
    font-weight: 600;
    transition: 0.5s;
    color: #ffffff;
    cursor: pointer;
  }

  .check input:hover {
      background-color: #693f01;
      color: #ffffff;
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

    <div class="center-text">
      <p style="font-size:50px; text-shadow: 1px 1px #ffffff;">Royal Paris<p>
      <p style="font-size:25px; text-shadow: 0.5px 0.5px #ffffff;">The former residence of Prince Roland Bonaparte, gracefully restored as a Parsian Palace</p>
    </div>

    <div class="available">
      <form method="POST" action="book_room.php">
        <div class="available-container">
          <div class="in">
            <label for="">Arrival</label>
            <input type="text" onfocus="(this.type = 'date')" name="date_in" autocomplete="off" min="2021-01-01" max="2026-12-31" value="<?php echo date('Y-m-d') ?>">
          </div>
          <div class="out">
            <label for="">Departure</label>
            <input type="text" onfocus="(this.type = 'date')" name="date_out" autocomplete="off" min="2021-01-01" max="2026-12-31" value="<?php echo date('Y-m-d',strtotime(date('Y-m-d').' + 3 days')) ?>">
          </div>
          <div class="check">
            <input type="submit" value="CHECK AVAILABILITY" />
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
