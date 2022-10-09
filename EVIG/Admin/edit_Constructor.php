<!DOCTYPE html>
<?php include "./aincludes/aNav.php"; ?>
<?php include "./aincludes/admin_header.php"; ?>
<?php $id = 0 ?>
<title>Update Constructor</title>

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

  $query = "select * from constructor where con_Id = '$id' ";
  $select_update_constructor = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_update_constructor)) {
    
    $id = $row['con_Id'];
    $firstname = $row['firstname'];
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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $fileds = $_POST['fileds'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $quali = $_POST['quali'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $nic = $_POST['nic'];

    $nic1 = $_FILES['nic1']['name'];
    $nic1_temp = $_FILES['nic1']['tmp_name'];

    $nic2 = $_FILES['nic2']['name'];
    $nic2_temp = $_FILES['nic2']['tmp_name'];

    $cover = $_FILES['cover']['name'];
    $cover_temp = $_FILES['cover']['tmp_name'];

    $password = md5($password);
    move_uploaded_file($nic1_temp, "../image/$nic1");
    move_uploaded_file($nic2_temp, "../image/$nic2");
    move_uploaded_file($cover_temp, "../image/$cover");

    $query = "UPDATE constructor set ";
    $query .= "firstname = '{$firstname}', ";
    $query .= "lastname = '{$lastname}', ";
    $query .= "fileds = '{$fileds}', ";
    $query .= "password = '{$password}', ";
    $query .= "email = '{$email}', ";
    $query .= "quali   = '{$quali}', ";
    $query .= "phone   = '{$phone}', ";
    $query .= "address   = '{$address}', ";
    $query .= "nic   = '{$nic}', ";
    $query .= "nic1   = '{$nic1}', ";
    $query .= "nic2   = '{$nic2}', ";
    $query .= "cover_img   = '{$cover}' ";
    $query .= "where con_Id  = '{$id}' ";
    
    $update_constructor = mysqli_query($connection, $query);

    if (!$update_constructor) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  }



  ?>
  <form class="box" action="edit_Constructor.php?edit=<?php echo($id)?>" method="post" enctype="multipart/form-data">
    <div class="container2">
      <h1>
        <center>Update Constructor</center>
      </h1>
      <hr>
      <label>Firstname:</label>
      <input value="<?php echo $firstname; ?>" type="text" name="firstname" placeholder="Firstname" size="5" required />
      <label>Lastname:</label>
      <input value="<?php echo $lastname; ?>" type="text" name="lastname" placeholder="Lastname" size="5" required />
      <br>
      <br>
      <label for="Fileds">Fileds:</label>
      <select value="<?php echo $fileds; ?>" name="fileds" id="Fileds">
        <option value="Mason&Concrete Finisher">Mason&Concrete Finisher</option>
        <option value="Landscaping">Landscaping</option>
        <option value="Electrician">Electrician</option>
        <option value="Plumber">Plumber</option>
        <option value="Carpenter">Carpenter</option>
      </select>
      <br>
      <br>
      <label> Password: </label>
      <input value="<?php echo $password; ?>" type="password" name="password" placeholder="Password" size="5" required>
      <label> Email: </label>
      <input value="<?php echo $email; ?>" type="text" name="email" placeholder="Email" size="5" required>
      <label> Qualifications (No of Years) : </label>
      <input value="<?php echo $quali; ?>" type="text" name="quali" placeholder="Qualifications" size="5" required>
      <label> Phone : </label>
      <input value="<?php echo $phone; ?>" type="text" name="phone" placeholder="phone no." size="10" required>
      Current Address :
      <input value="<?php echo $address; ?>" type="text" cols="80" rows="5" name="address" placeholder="Current Address" value="address" / required>
      <br>
      <br>
      <label>NIC Number : </label>
      <input value="<?php echo $nic; ?>" type="text" id="NIC" name="nic" placeholder="NIC" size="5" required>
      <label> Image of your NIC Front </label>
      <br>
      <input type="file" name="nic1">
      <img width="150" src="../image/<?php echo $nic1; ?>">

      <br>
      <br>
      <label> Image of your NIC Back </label>
      <br>
      <input type="file" name="nic2">
      <img width="150" src="../image/<?php echo $nic2; ?>">

      <br>
      <br>
      <label>Cover Image</label>
      <br>
      <input type="file" name="cover">
      <img width="150" src="../image/<?php echo $cover; ?>">

      <button type="submit" name="submit" class="registerbtn">Update</button>
    </div>
  </form>
</body>

</html>