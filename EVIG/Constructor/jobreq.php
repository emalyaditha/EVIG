<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <?php include "./cincludes/cNav.php"; ?>
  <br>
  <br>
  <br>
  <h1>
    <center>MY ORDERS</center>
  </h1>
  <br>
  <br>
  <center>
    <table>
      <thead>
        <tr>
           <th>ID</th>
          <th>Customer Name</th>
          <th>Job Name</th>
          <th>Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php

      $query = "select * from booking";
      $select_customer = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_customer)) {
        $b_id = $row['b_Id'];
        $cus_name = $row['cus_Name'];
        $job = $row['job'];
        $date = $row['date'];
        $status = $row['status'];

        echo "<tr>";
        echo "<td>$b_id</td>";
        echo "<td>$cus_name</td>";
        echo "<td>$job</td>";
        echo "<td>$date</td>";
        echo "<td>$status</td>";
        echo "<td><a href='jobreq.php?Accept={$b_id}'>Accept</a>";

        echo "</tr>";
      }
        if (isset($_GET['Accept'])) {
          $act = $_GET['Accept'];
          $query = "UPDATE `booking` SET `status`='Accepted' WHERE `b_Id`=$act";
        
          $Accept_query = mysqli_query($connection, $query);
        }
      ?>
      </tbody>
    </table>
  </center>
</body>

</html>