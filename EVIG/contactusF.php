<?php include "db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "insert into contactus(name,phone,email,message) ";
    $query .= "values ('{$name}','{$phone}', '{$email}','{$message}' )";
    $result = mysqli_query($connection, $query);
    header("refresh:0; url=contactUs.php");
    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }
}
