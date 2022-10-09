<!DOCTYPE html>
<?php include "./aincludes/admin_header.php"; ?>

<title>View Constructor</title>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./aCss/table.css">
  <link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
  <link rel="stylesheet" type="text/css" href="./aCss/search.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php include "./aincludes/aNav.php";
  ?>
  <h1>
    <center>View Constructor</center>
  </h1>
  <?php
  $select_customer = array();
  
  ?>
  <h2>Search</h2>
  <form class="example" action="viewConstructor.php" method="post" style="margin:auto;max-width:300px">
    <input name="search" type="text" placeholder="Search.." name="search2">
    <button name="submit" type="submit"><i class="fa fa-search"></i></button>
  </form>

  <table id="cTable1">

    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname </th>
        <th>Filed</th>
        <th>Email</th>
        <th>Status</th>
        <th>Phone</th>
        <th>NIC Number</th>
        <th>Cover</th>
        <th>Action</th>
      </tr>
    </thead>

    <?php
    if (isset($_POST['submit'])) {
      $search  = $_POST['search'];
      $query = "SELECT * FROM constructor WHERE firstname = '$search' ";
      $select_customer = mysqli_query($connection, $query);

      foreach ($select_customer as $key => $row) {

        $id = $row['con_Id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $fileds = $row['fileds'];
        $email = $row['email'];
        $status = $row['status'];
        $phone = $row['phone'];
        $nic = $row['nic'];

        $cover = $row['cover_img'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$firstname</td>";
        echo "<td>$lastname</td>";
        echo "<td>$fileds</td>";
        echo "<td>$email</td>";
        echo "<td>$status</td>";
        echo "<td>$phone</td>";
        echo "<td>$nic</td>";

        echo "<td><img width='100' src='../image/$cover'></td>";
        echo "<td><a href='viewConstructor.php?activate={$id}'>Activate</a><br><a href='viewConstructor.php?deactivate={$id}'>Deactivate</a><br><a href='edit_Constructor.php?edit={$id}'>Update</a></td>";

        echo "</tr>";
      }
    } else {
      $query = "select * from constructor";
      $select_customer = mysqli_query($connection, $query);

      foreach ($select_customer as $key => $row) {

        $id = $row['con_Id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $fileds = $row['fileds'];
        $email = $row['email'];
        $status = $row['status'];
        $phone = $row['phone'];
        $nic = $row['nic'];

        $cover = $row['cover_img'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$firstname</td>";
        echo "<td>$lastname</td>";
        echo "<td>$fileds</td>";
        echo "<td>$email</td>";
        echo "<td>$status</td>";
        echo "<td>$phone</td>";
        echo "<td>$nic</td>";

        echo "<td><img width='100' src='../image/$cover'></td>";
        echo "<td><a href='viewConstructor.php?activate={$id}'>Activate</a><br><a href='viewConstructor.php?deactivate={$id}'>Deactivate</a><br><a href='edit_Constructor.php?edit={$id}'>Update</a></td>";

        echo "</tr>";
      }
    }

    if (isset($_GET['deactivate'])) {
      $act = $_GET['deactivate'];

      $query = "UPDATE `constructor` SET `status`='Deactivate' WHERE `con_Id`=$act";


      $delete_query = mysqli_query($connection, $query);
      header("refresh:0; url=viewConstructor.php");
    }

    if (isset($_GET['activate'])) {
      $act = $_GET['activate'];

      $querys = "UPDATE `constructor` SET `status`='Active' WHERE `con_Id`=$act";

      $active_query = mysqli_query($connection, $querys);
      header("refresh:0; url=viewConstructor.php");
      
    }
    ?>
    </tbody>
  </table>
  </div>

</body>

</html>