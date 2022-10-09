<!DOCTYPE html>
<?php include "./aincludes/aNav.php"; ?>
<?php include "./aincludes/admin_header.php"; ?>
<?php $id = 0 ?>
<title>Update Customer</title>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="aCss/form.css">
  <link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>

<body>
  <?php
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
  }
  $query = "select * from customer where cus_Id = '$id' ";
  $select_update_customer = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_update_customer)) {
    $id = $row['cus_Id'];
    $name = $row['username'];
    $password = $row['password'];
    $email = $row['email'];
    $usertype = $row['usertype'];
    $number = $row['number'];
    $address = $row['address'];
    $niccc = $row['nic'];
    $nic1 = $row['nic1'];
  }

  if (isset($_POST['update_profile1'])) {
    $id=$_POST['id'];
    $name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $niccc = $_FILES['nic']['name'];
    $nic_temp = $_FILES['nic']['tmp_name'];

    $nic1 = $_FILES['nic1']['name'];
    $nic1_temp = $_FILES['nic1']['tmp_name'];


    $password = md5($password);
    move_uploaded_file($nic_temp, "../image/$niccc");
    move_uploaded_file($nic1_temp, "../image/$nic1");

    $query = "UPDATE customer set ";
    $query .= "username = '{$name}', ";
    $query .= "password = '{$password}', ";
    $query .= "email = '{$email}', ";
    $query .= "usertype = '{$usertype}', ";
    $query .= "number = '{$number}', ";
    $query .= "address= '{$address}', ";
    $query .= "nic   = '{$niccc}', ";
    $query .= "nic1   = '{$nic1}' ";
    $query .= "where cus_Id  = '{$id}' ";

    $update_customer = mysqli_query($connection, $query);

    if (!$update_customer) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  }
  ?>
  <form class="box" action="edit_customer.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>" hidden>

    <div class="container2">
      <h1>
        <center>Update Customer</center>
      </h1>
      <hr>
      <label> Name : </label>
      <input value="<?php echo $name; ?>" type="text" id="Name" name="username" placeholder="Name" size="5" required />


      <label> Password : </label>
      <input value="<?php echo $password; ?>" type="password" id="pass" name="password" placeholder="Password" size="5" required />
      <label> Email : </label>
      <input value="<?php echo $email; ?>" type="text" id="email" name="email" placeholder="Email" size="5" required />
      <label> User Type : </label>
      <input value="<?php echo $usertype; ?>" type="text" id="usertype" name="usertype" placeholder="Usertype" size="5" required />
      <label> Phone : </label>
      <input value="<?php echo $number; ?>" type="text" id="number" name="number" placeholder="phone no." size="10" / required>
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

      <button type="submit" name="update_profile1" class="registerbtn">Update</button>
    </div>
  </form>
</body>

</html>