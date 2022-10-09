<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <link rel="stylesheet" type="text/css" href="./css/nav.css">
  <link rel="stylesheet" type="text/css" href="./css/contactus.css">
  <link rel="stylesheet" type="text/css" href="./css/footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <title>Hire</title>
</head>
<?php include "includes/nav.php"; ?>

<body>
  <?php
  if (isset($_GET['pass'])) {
    $name = $_GET['pass'];
  }

  $query = "select * from constructor where firstname = '$name' ";
  $select_update_constructor = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_update_constructor)) {

    $id = $row['con_Id'];
    $name = $row['firstname'];
    $lastname = $row['lastname'];
    $fileds = $row['fileds'];
    $password = $row['password'];
    $email = $row['email'];
    $quali = $row['quali'];
    $phone = $row['phone'];
    $address = $row['address'];
    $nic = $row['nic'];
    $nic1 = $row['nic1'];
    $nic2 = $row['nic2'];
    $cover = $row['cover_img'];
  }
  if (isset($_POST['submit'])) {

    $cusname = $_POST['cus_name'];
    $name = $_POST['conname'];
    $fileds = $_POST['job'];
    $number = $_POST['phone'];
    $date = $_POST['date'];
    $req = $_POST['message'];
    $status = "Pending";


    $query = "insert into booking(cus_Name,con_Name,job,number,date,req,status) ";
    $query .= "values ('{$cusname}','{$name}','{$fileds}', '{$number}','{$date}','{$req}','{$status}' )";
    $result = mysqli_query($connection, $query);
    header("refresh:5; url=hire_info.php");
    if (!$result) {
      die('Query Failed' . mysqli_error($connection));
    }
  }
  ?>
  <section id="contact">

    <div class="container">
      <br>
      <br>
      <br>
      <h1>Request Constructor</h1>
      <br>
      <div class="row">
        <div class="col-md-6">
          <form class="box" action="hire_info.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="cus_name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input type="text" value="<?php echo $name; ?>" name="conname" class="form-control" placeholder="Con Name" required>
            </div>
            <div class="form-group">
              <input type="text" value="<?php echo $fileds; ?>" name="job" class="form-control" placeholder="Job Title" required>
            </div>
            <div class="form-group">
              <input type="number" name="phone" class="form-control" placeholder="Phone." required>
            </div>
            <div class="form-group">
              <input type="date" name="date" class="form-control" placeholder="Date" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="4" placeholder="Any Request" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">SEND MESSAGE</button>
          </form>
        </div>
      </div>
    </div>
  </section>


  <?php include "./includes/footer.php"; ?>
</body>

</html>