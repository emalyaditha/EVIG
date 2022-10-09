<html>
<?php include "./aincludes/admin_header.php";?>
<?php include "./aincludes/aNav.php";
  ?>
<?php

if(isset($_SESSION['usertype'])){

if($_SESSION['usertype']  !=='Admin'){

  header("Location:../index.php");
}
}
$username = "";
$password = "";
$email = "";
$number = "";
$address = "";

$niccc =
  $nic_temp = "";

$nic1 = "";
$nic1_temp =
  $usernames = "";



?>
<title>Addmin Profile</title>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="aCss/form.css">
  <link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
  <link rel="stylesheet" type="text/css" href="../aCss/form">
</head>

<body>

  <?php if (isset($username)) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM `customer` WHERE `username` = '{$username}' ";
    $select_profile = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_profile)) {

      $username = $row['username'];
      $password = $row['password'];
      $email = $row['email'];
      $number = $row['number'];
      $address = $row['address'];
      $niccc = $row['nic'];
      $nic1 = $row['nic1'];
      $usertype = $row['usertype'];
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

    $usertype = $_POST['usertype'];

    $password = md5($password);
    move_uploaded_file($nic_temp, "../image/$niccc");
    move_uploaded_file($nic1_temp, "../image/$nic1");

    $query = "UPDATE customer set ";
    $query .= "password = '{$password}', ";
    $query .= "email = '{$email}', ";
    $query .= "number = '{$number}', ";
    $query .= "address= '{$address}', ";
    $query .= "nic   = '{$niccc}', ";
    $query .= "nic1   = '{$nic1}', ";
    $query .= "usertype   = '{$usertype}' ";
    $query .= "where username  = '{$username}' ";

    $update_profile = mysqli_query($connection, $query);

    if (!$update_profile) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  }
  ?>
  <form class="box" action="aProfile.php" method="post" enctype="multipart/form-data">
    <div class="container2">
      <h1>
        <center>Profile</center>
      </h1>
      <hr>
      <label> Name : </label>
      <input value="<?php echo $username; ?>" type="text" id="Name" name="username" placeholder="Name" size="5" required >
      <label> Password : </label>
      <input value="<?php echo $password; ?>" type="password" id="pass" name="password" placeholder="Password" size="5" required >
      <label> Email : </label>
      <input value="<?php echo $email; ?>" disabled type="text" id="email" name="email" placeholder="Email" size="5" required >
      <label> Phone : </label>
      <input value="<?php echo $number; ?>" type="text" id="number" name="number" placeholder="phone no." size="10"  required>
      Current Address :
      <input value="<?php echo $address; ?>" type="text" cols="80" rows="5" name="address" placeholder="Current Address" value="address" / required>
      </input>
      <label for="image">Image of your NIC</label>
      <br>
      <input type="file" name="nic">
      <img width="150" src="../image/<?php echo $niccc; ?>">
      <br>
      <input type="file" name="nic1">
      <img width="150" src="../image/<?php echo $nic1; ?>">
      <br>
      <br>
      Usertype :
      <input value="<?php echo $usertype; ?>" type="text"  name="usertype" placeholder="usertype" required>
      <button type="submit" name="update_profile" class="registerbtn">Update</button>
    </div>
  </form>
</body>

</html>