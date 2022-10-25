<?php


require 'connect.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // echo '<script>alert("' . $name . $email . $message . '")</script>';

    $send_date = date('Y-m-d');
    $result = $dbc->query("INSERT INTO `message`(`user_name`, `email`, `message`,`send_date`) VALUES ('$name','$email','$message','$send_date')");


    $success = '';
    if ($result == true) {
       $success = 'Message Sent Successfully';
    }
}
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Contact Us | Royal</title>
    <!--<link rel="stylesheet" href="contactus_style.css" />-->
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        /* Google Font CDN Link */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #c8e8e9;
        }
        .bg {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            text-align: center; 
            background: url("img/contact.jpg");
		    background-repeat: no-repeat;
		    background-size: cover;
            background-attachment: fixed;
            background-position: top;
            position: relative;
            text-align: center;
        }
        
        .nav {
            width: 100%;
            height: auto;
            font-family: 'Josefin Sans';
            background-color: #454b5450;
            border-bottom: 1px solid #ffffff;
            padding: 5px;
            transition: 0.5s;
            display: flex;
            justify-content: space-around;
        }
        
        .nav a {
            color: #ffffff;
        }
        
        .nav:hover {
            background-color: #ffffff;
        }
        
        .nav:hover a {
            color: #000000 !important;
        }
        
        .nav:hover .nav-left div i {
            color: #d4b862;
        }
        
        .nav-left div i {
            color: #ffffff;
        }
        
        .nav-left {
            width: 300px;
            display: flex;
            align-items: center;
        }
        
        .nav-left div {
            font-size: 30px;
            margin-right: 10px;
        }
        
        .nav-right {
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
        
        a.about {
            float: right;
            font-size: 16px;
            margin-left: 17px;
            padding: 3px;
        }

        .container {
            margin: 50px auto;
            width: 70%;
            background: #ffffff;
            border-radius: 6px;
            /* padding: 20px 60px 30px 40px; */
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .container .content {
            width: 90%;
            margin: auto;
        }

        .container h1{
            width: 100%;
            font-family: 'Playfair Display', serif;
            border-bottom: 3px solid #d4b862;
            text-align: left;
            padding: 10px 45px;
            color: #d4b862;
            margin-bottom: 20px;
        }
        
        .container h1:nth-child(2) {
            width: 90%;
            margin: auto;
            font-family: 'Playfair Display', serif;
            border-bottom: 2px solid #d4b862;
            text-align: left;
            padding-bottom: 10px;
            color: #d4b862;
            padding: 10px 0px;
        }

        .container .content .left-side {
            width: 100%;
            height: auto;
            margin-top: 15px;
            /* position: relative; */
            padding-bottom: 15px;
            border-bottom: 1px solid #454b54;
            margin-bottom: 20px;
        }

        /* .content .left-side::before {
            content: "";
            position: absolute;
            height: 70%;
            width: 2px;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: #afafb6;
        } */

        .content .left-side .details {
            /* margin: 14px; */
            text-align: left;
            display: flex;
            align-items: center;
        }

        /* .content .left-side .details i {
            font-size: 30px;
            color: #d4b862;
            margin-bottom: 10px;
        } */

        .content .left-side .details .topic {
            font-size: 15px;
            /* font-weight: 500; */
            width: 20%;
        }

        .content .left-side .details .text-one {
            font-size: 15px;
        }

        .container .content .right-side {
            width: 100%;
            margin: auto;
        }
        .container .right-side h1 {
            width: 100%;
            margin: auto;
            font-family: 'Playfair Display', serif;
            border-bottom: 2px solid #d4b862;
            text-align: left;
            padding-bottom: 10px;
            color: #d4b862;
            padding: 10px 0px;
            margin-bottom: 15px;
        }
        .container .right-side p {
            text-align: left;
            font-size: 15px;
            margin-bottom: 15px;
        }

        /* .content .right-side .topic-text {
            font-size: 23px;
            font-weight: 600;
            color: #d4b862;
        } */

        .right-side .input-box {
            height: 50px;
            width: 100%;
            margin: 12px 0;
        }

        .right-side .input-box input,
        .right-side .input-box textarea {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            background: #f0f1f8;
            border-radius: 6px;
            padding: 0 15px;
            resize: none;
        }

        .right-side .message-box {
            min-height: 110px;
            width: 100%;
        }

        .right-side .input-box textarea {
            padding-top: 6px;
        }

        .right-side .button {
            display: flex;
            margin-bottom: 30px;
        }

        .right-side .button input[type="submit"] {
            color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: #d4b862;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button input[type="submit"]:hover {
            background: rgb(196 163 109);
        }

        @media (max-width: 950px) {
            .container {
                width: 90%;
                padding: 30px 40px 40px 35px;
            }

            .container .content .right-side {
                width: 75%;
                margin-left: 55px;
            }
        }

        @media (max-width: 820px) {
            .container {
                margin: 40px 0;
                height: 100%;
            }

            .container .content {
                flex-direction: column-reverse;
            }

            .container .content .left-side {
                width: 100%;
                flex-direction: row;
                margin-top: 40px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .container .content .left-side::before {
                display: none;
            }

            .container .content .right-side {
                width: 100%;
                margin-left: 0;
            }
        }

        .alert {
            width: 50%;
            margin: 0 auto;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 20px;
            background-color: green;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
        footer{
            color: #454b54;
            width: 100%;
            margin: auto;
            background-color: #ffffff;
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            padding: 20px 50px;
        }
        footer div:nth-child(2){
            text-align: right;
        }
        footer div:nth-child(2) p a{
            color: #454b54;
        }
        footer div:nth-child(2) p a:hover{
            color: #000000;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="nav">
            <div class="nav-left">
                <div><i class="fa-regular fa-chess-queen"></i></div>
                <a class="name" href="index.php">Royal</a>
            </div>
            <div class="nav-right">
                <a class="about " href="index.php">HOME</a>
                <a class="about" href="about.html">ABOUT US</a>
                <a class="about" href="contact.php">CONTACT US</a>
                <a class="about" href="facilities.html">FACILITIES</a>
            </div>
        </div>
        <div class="container">
                <h1>Contact Us</h1>
                <h1>Royal Paris</h1>
                <div class="content">
                <div class="left-side">
                    <div class="address details">
                        <!-- <i class="fas fa-map-marker-alt"></i> -->
                        <div class="topic">Address</div>
                        <div class="text-one">10, avenue d'Iéna, Paris 75116 France</div>
                    </div>
                    <div class="phone details">
                        <!-- <i class="fas fa-phone-alt"></i> -->
                        <div class="topic">Phone</div>
                        <div class="text-one">+0098 9893 5647, +0096 3434 5678</div>
                    </div>
                    <div class="email details">
                        <!-- <i class="fas fa-envelope"></i> -->
                        <div class="topic">Email</div>
                        <div class="text-one">RoyalParis@gmail.com</div>
                    </div>
                </div>
                <div class="right-side">
                    <h1>Send us a message</h1>
                    <p>
                        If you have any questions regarding on our booking service, please
                        contact us by calling or e-mailling us and we'll get back to you as
                        soon as possible. We look forward to hearing from you.
                    </p>

                <?php 
                    if(!empty($success)){
                        echo '<div class="alert">
                        <span class="closebtn" onclick="hideInfoMessage()">&times;</span>
                        <strong>'.$success.'</strong>
                        </div>';
                    }
                
                ?>
                <form action="" method="post">
                    <div class="input-box" style="display: flex; justify-content: space-between;">
                        <input style="width:49%" type="text" name="name" placeholder="Enter your name" required />
                        <input style="width:49%" type="email" name="email" placeholder="Enter your email" required />
                    </div>
                    <div class="input-box message-box">
                        <textarea name="message" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" value="Send Now" name="submit" />
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <footer>
        <div>
            <p>10th - Gare du Nord, Paris, France</p>
            <p>T: +0098 9893 5647, +0096 3434 5678</p>
        </div>
        <div>
            <p>
               <a href="about.html">About Royal Hotel</a> | 
               <a href="">Privacy Policy</a> | 
               <a href="">Terms</a> | 
               <a href="">Site Map</a>
            </p>
            <p>© 2022 Royal International Hotel Management Ltd. All Rights Reserved. ICP license: 17055189</p>
        </div>
    </footer>
    <script>
        function hideInfoMessage(){
            let alert = document.querySelector('.alert');
            alert.style.display='none';
            sessionStorage.removeItem('success');
        }
    </script>
</body>

</html>