<!DOCTYPE html>
<html lang="en">
<head>
<?php include "./aincludes/aNav.php"; ?>
<?php include "./aincludes/admin_header.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./aCss/table.css">
  <link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Document</title>
</head>
<body>
<br>
<br>

<h1>
    <center>Get In Touch</center>
  </h1>
  <center>
<table id="cTable1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
           $query = "select * from contactus";
           $select_contactus = mysqli_query($connection,$query);

           while($row = mysqli_fetch_assoc($select_contactus)) {
               $id = $row['id'];
               $name = $row['name'];
               $phone = $row['phone'];
               $email= $row['email'];
               $message = $row['message'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$phone</td>";
                echo "<td>$email</td>";
                echo "<td>$message</td>";;
                echo "<td><a href='git.php?delete={$id}'>Delete</a></td>";
                
                echo "</tr>";
           }
   
            ?>            
        </tbody>
        </table>
        </center>
        <?php 
        
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "delete from contactus where id = {$id}";
            $delete_query = mysqli_query($connection, $query);
        }
        ?>
</body>
</html>