<!DOCTYPE html>
<?php include "./aincludes/admin_header.php"; ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./aCss/table.css">
  <link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <title>Plans</title>
</head>

<body>
  <?php include "./aincludes/aNav.php"; ?>
  <br>
  <br>
  <br>
  <h1>
    <center>Plans</center>
  </h1>
  <br>
  <br>
  <center>
    <table id="pTable1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Plan Name</th>
          <th>Mason&Concrete Finisher</th>
          <th>Landscaping</th>
          <th>Electrician</th>
          <th>Plumber</th>
          <th>Carpenter</th>
          <th>Price</th>
          <th>Cover</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php

      $query = "select * from plan";
      $select_plans = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_plans)) {
        $p_id = $row['p_Id'];
        $plan_Name = $row['plan_Name'];
        $mason = $row['mason'];
        $landscaping = $row['landscaping'];
        $electrician = $row['electrician'];
        $plumber = $row['plumber'];
        $carpenter = $row['carpenter'];
        $price = $row['price'];
        $cover = $row['cover'];

        echo "<tr>";
        echo "<td>$p_id</td>";
        echo "<td>$plan_Name</td>";
        echo "<td>$mason</td>";
        echo "<td>$landscaping</td>";
        echo "<td>$electrician</td>";
        echo "<td>$plumber</td>";
        echo "<td>$carpenter</td>";
        echo "<td>$price</td>";
        echo "<td><img width='100' src='../image/$cover'></td>";
        echo "<td><a href='edit_plan.php?edit={$p_id}'>Update</a></td>";

        echo "</tr>";
      }

      ?>
      </tbody>
    </table>
  </center>
</body>

</html>