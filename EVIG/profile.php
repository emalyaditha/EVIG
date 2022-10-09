<html>
<title>Profile</title>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <?php include "includes/nav.php"; ?>
  <?php if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "select * from customer where username = '{$username}'";
    $select_profile = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_profile)) {

      $username = $row['username'];
      $password = $row['password'];
      $email = $row['email'];
      $number = $row['number'];
      $address = $row['address'];
      $nicc = $row['nic'];
      $nic1 = $row['nic1'];
    }
  }
  ?>
  <?php

  if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $niccc = $_FILES['nic']['name'];
    $nic_temp = $_FILES['nic']['tmp_name'];

    $nic1 = $_FILES['nic1']['name'];
    $nic1_temp = $_FILES['nic1']['tmp_name'];


    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);
    $number = mysqli_real_escape_string($connection, $number);
    $address = mysqli_real_escape_string($connection, $address);

    $password = md5($password);
    move_uploaded_file($nic_temp, "./image/$niccc");
    move_uploaded_file($nic1_temp, "./image/$nic1");

    $query = "UPDATE customer set ";
    $query .= "password = '{$password}', ";
    $query .= "email = '{$email}', ";
    $query .= "number = '{$number}', ";
    $query .= "address= '{$address}', ";
    $query .= "nic   = '{$niccc}', ";
    $query .= "nic1   = '{$nic1}' ";
    $query .= "where username  = '{$username}' ";

    $update_profile = mysqli_query($connection, $query);

    if (!$update_profile) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  }



  ?>
  <form class="box" action="profile.php" method="post" enctype="multipart/form-data">
    <div class="container2">
      <h1>
        <center>Profile</center>
      </h1>
      <hr>
      <label> Name : </label>
      <input value="<?php echo $username; ?>" type="text" id="Name" name="username" placeholder="Name" size="5" required />
      <label> Password : </label>
      <input value="<?php echo $password; ?>" type="password" id="pass" name="password" placeholder="Password" size="5" required />
      <label> Email : </label>
      <input value="<?php echo $email; ?>" disabled type="text" id="email" name="email" placeholder="Email" size="5" required />
      <label> Phone : </label>
      <input value="<?php echo $number; ?>" type="text" id="number" name="number" placeholder="phone no." size="10" / required>
      Current Address :
      <input value="<?php echo $address; ?>" type="text" cols="80" rows="5" name="address" placeholder="Current Address" value="address" / required>
      </input>
      <label for="image">Image of your NIC</label>
      <br>
      <input type="file" name="nic">
      <img width="150" src="./image/<?php echo $nicc; ?>">
      <br>
      <input type="file" name="nic1">
      <img width="150" src="./image/<?php echo $nic1; ?>">

      <button type="submit" name="update_profile" class="registerbtn">Update</button>
    </div>
  </form>
  <?php include "./includes/footer.php"; ?>
</body>

</html>