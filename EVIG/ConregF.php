<?php include "db.php";

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
   
    $cover = $_FILES['Cover']['name'];
    $cover_temp = $_FILES['Cover']['tmp_name'];

    $usertype = "constructor";
    $status = "Active";

    $password = md5($password);
    move_uploaded_file($nic1_temp, "./image/$nic1");
    move_uploaded_file($nic2_temp, "./image/$nic2");
    move_uploaded_file($cover_temp, "./image/$cover");


    $query = "insert into constructor(firstname,lastname,fileds,password,email,quali,phone,address,nic,nic1,nic2,cover_img,usertype,status) ";
    $query .= "values ('{$firstname}','{$lastname}', '{$fileds}','{$password}', '{$email}', '{$quali}', '{$phone}', '{$address}', '{$nic}', '{$nic1}', '{$nic2}','{$cover}', '{$usertype}', '{$status}' )";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }
}
