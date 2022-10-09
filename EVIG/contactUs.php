<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/contactus.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Contact Us</title>
</head>
<?php include "includes/nav.php"; ?>
<body>
    <br>
    <br>
    <br>
<section id="contact">
 <div class="container">
    <h1>Get In Touch</h1>
    <div class="row">
    <div class="col-md-6">
    <form class="box" action="contactusF.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Your Name" required>    
    </div>
    <div class="form-group">
    <input type="number" name="phone" class="form-control" placeholder="Phone no." required>    
    </div>
    <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="Email id" required>    
    </div>
    <div class="form-group">
    <textarea class="form-control" name="message" rows="4" placeholder="Your Message" required></textarea>    
    </div>
    <button type="submit" name="submit" class="btn btn-primary">SEND MESSAGE</button>
    </form>
    </div>
    <div class="col-md-6 contact-info">
        <div class="follow"><b>Address:</b><i class="fa fa-map-marker"></i>No. 36, De Kretser Place,Bambalapitiya Colombo 04</div>
        <div class="follow"><b>Phone:</b><i class="fa fa-phone"></i>0771745166</div>
        <div class="follow"><b>Email:</b><i class="fa fa-envelope-o"></i>evig@gmail.com</div>
    </div>
    </div>
 </div>
</section>
<?php include "./includes/footer.php"; ?>
</body>
</html>