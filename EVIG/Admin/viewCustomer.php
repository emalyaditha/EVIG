<!DOCTYPE html>
<?php include "./aincludes/admin_header.php"; ?>
<html lang="en">
<title>View Customer</title>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./aCss/table.css">
  <link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
  <link rel="stylesheet" type="text/css" href="./aCss/search.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>

<body>
  <?php include "./aincludes/aNav.php"; ?>
  <br>
  <br>
  <br>
  <h1>
    <center>View Customer</center>
  </h1>
  <br>
  <?php
  $select_customer = array();
  ?>
  <h2>Search</h2>
  <form class="example" action="viewCustomer.php" method="post" style="margin:auto;max-width:300px">
    <input name="search" type="text" placeholder="Search.." name="search2">
    <button name="submit" type="submit"><i class="fa fa-search"></i></button>
  </form>
  <br>
  <center>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password </th>
            <th>Email</th>
            <th>Usertype</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Front NIC</th>
            <th>Back NIC</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        if (isset($_POST['submit'])) {
          $search  = $_POST['search'];
          $query = "SELECT * FROM customer WHERE username = '$search' ";
          $select_customer = mysqli_query($connection, $query);

          foreach ($select_customer as $key => $row) {
            $id = $row['cus_Id'];
            $name = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
            $usertype = $row['usertype'];
            $phone = $row['number'];
            $status = $row['status'];
            $nic = $row['nic'];
            $nic1 = $row['nic1'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$password</td>";
            echo "<td>$email</td>";
            echo "<td>$usertype</td>";
            echo "<td>$phone</td>";
            echo "<td>$status</td>";
            echo "<td><img width='100' src='../image/$nic'></td>";
            echo "<td><img width='100' src='../image/$nic1'></td>";
            echo "<td><a href='viewCustomer.php?activate={$id}'>Activate</a><br><a name='deactive' href='viewCustomer.php?deactivate={$id}'>Deactivate</a><br><a href='edit_customer.php?edit={$id}'>Update</a></td>";
            echo "</tr>";
          }
        } else {
          $query = "select * from customer";
          $select_customer = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_customer)) {
            $id = $row['cus_Id'];
            $name = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
            $usertype = $row['usertype'];
            $phone = $row['number'];
            $status = $row['status'];
            $nic = $row['nic'];
            $nic1 = $row['nic1'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$password</td>";
            echo "<td>$email</td>";
            echo "<td>$usertype</td>";
            echo "<td>$phone</td>";
            echo "<td>$status</td>";
            echo "<td><img width='100' src='../image/$nic'></td>";
            echo "<td><img width='100' src='../image/$nic1'></td>";
            echo "<td><a href='viewCustomer.php?activate={$id}'>Activate</a><br><a name='deactive' href='viewCustomer.php?deactivate={$id}'>Deactivate</a><br><a href='edit_customer.php?edit={$id}'>Update</a></td>";
            echo "</tr>";
          }
        }
        if (isset($_GET['deactivate'])) {
          $act = $_GET['deactivate'];
          $query = "UPDATE `customer` SET `status`='Deactivate' WHERE `cus_Id`=$act";
          $delete_query = mysqli_query($connection, $query);
        }
        if (isset($_GET['activate'])) {
          $act = $_GET['activate'];
          $querys = "UPDATE `customer` SET `status`='Active' WHERE `cus_Id`=$act";
          $active_query = mysqli_query($connection, $querys);
        }
        ?>
        </tbody>
      </table>
    </div>
  </center>
</body>

</html>