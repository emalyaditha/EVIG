<!DOCTYPE html>
<?php include "./aincludes/aNav.php";?>
<?php include "./aincludes/admin_header.php"; ?>
<?php $p_id = 0 ?>
<title>Update Plans</title>

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
    $p_id = $_GET['edit'];
  }
    $query = "select * from plan where p_Id = '$p_id' ";
    $select_update_plan = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_update_plan)) {
      $p_id = $row['p_Id'];
      $plan_Name = $row['plan_Name'];
      $mason = $row['mason'];
      $landscaping = $row['landscaping'];
      $electrician = $row['electrician'];
      $plumber = $row['plumber'];
      $carpenter = $row['carpenter'];
      $price = $row['price'];
      $cover = $row['cover'];
    }
  
    if (isset($_POST['submit'])) {
      
      $p_id = $_POST['p_Id'];
      $plan_Name = $_POST['plan_Name'];
      $mason = $_POST['mason'];
      $landscaping = $_POST['landscaping'];
      $electrician = $_POST['electrician'];
      $plumber = $_POST['plumber'];
      $carpenter = $_POST['carpenter'];
      $price = $_POST['price'];

      $cover = $_FILES['cover']['name'];
      $cover_temp = $_FILES['cover']['tmp_name'];

      move_uploaded_file($cover_temp, "../image/$cover");
      $query = "UPDATE plan set ";
      $query .= "plan_Name = '{$plan_Name}', ";
      $query .= "mason = '{$mason}', ";
      $query .= "landscaping = '{$landscaping}', ";
      $query .= "electrician = '{$electrician}', ";
      $query .= "plumber= '{$plumber}', ";
      $query .= "carpenter   = '{$carpenter}', ";
      $query .= "price   = '{$price}', ";
      $query .= "cover  = '{$cover}' ";
      $query .= "where p_Id  = '{$p_id}' ";
      
      $update_plan = mysqli_query($connection, $query);
      header("Location:plans.php");

      if (!$update_plan) {
        die("QUERY FAILED" . mysqli_error($connection));
      }
    }



  ?>
  <form class="box" action="edit_plan.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="p_Id" value="<?php echo $p_id; ?>" hidden>
    <div class="container2">
      <h1>
        <center>Update Plan</center>
      </h1>
      <hr>
    
      <label> Plan Name : </label>
      <input value="<?php echo $plan_Name; ?>" type="text" name="plan_Name" placeholder="Plan_Name" size="5" required />
      <label> Mason Name : </label>
      <input value="<?php echo $mason; ?>" type="text" name="mason" placeholder="Mason" size="5" required />
      <label> Landscaping Name : </label>
      <input value="<?php echo $landscaping; ?>" type="text" name="landscaping" placeholder="Landscaping" size="5" required />
      <label> Electrician Name : </label>
      <input value="<?php echo $electrician; ?>" type="text"  name="electrician" placeholder="Electrician" size="10" / required>
      <label> Plumber Name : </label>
      <input value="<?php echo $plumber; ?>" type="text" name="plumber" placeholder="Plumber" size="5" required />
      <label> Carpenter Name : </label>
      <input value="<?php echo $carpenter; ?>" type="text" name="carpenter" placeholder="Carpenter" size="5" required />
      Price :
      <input value="<?php echo $price; ?>" type="text" cols="80" rows="5" name="price" placeholder="Price" value="address" / required>
      </input>
      <label for="cover">Cover</label>
      <br>
      <input type="file" name="cover">
      <img width="150" src="../image/<?php echo $cover; ?>">
      <button type="submit" name="submit" class="registerbtn">Update</button>
    </div>
  </form>
</body>

</html>