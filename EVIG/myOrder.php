<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/table.css">
  <link rel="stylesheet" type="text/css" href="./css/nav.css">
  <link rel="stylesheet" type="text/css" href="./css/footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <?php include "./includes/nav.php"; ?>
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
          <th>Your Name</th>
          <th>Constructor Name</th>
          <th>Job Name</th>
          <th>Date</th>
          <th>Request</th>
        </tr>
      </thead>
      <?php

      $query = "select * from booking";
      $select_customer = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_customer)) {
        $cus_name = $row['cus_Name'];
        $con_name = $row['con_Name'];
        $job = $row['job'];
        $date = $row['date'];
        $status = $row['status'];

        echo "<tr>";
        echo "<td>$cus_name</td>";
        echo "<td>$con_name</td>";
        echo "<td>$job</td>";
        echo "<td>$date</td>";
        echo "<td>$status</td>";

        echo "</tr>";
      }

      ?>
      </tbody>
    </table>
  </center>
</body>

</html>