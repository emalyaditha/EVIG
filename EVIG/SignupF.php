<?php include "db.php";
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $cpassword = $_POST['Conpassword'];
    $status = "Active";

    $nic = $_FILES['nic']['name'];
    $nic_temp = $_FILES['nic']['tmp_name'];

    $nic1 = $_FILES['nic1']['name'];
    $nic1_temp = $_FILES['nic1']['tmp_name'];

    $usertype = "customer";
    if ($cpassword !== $password) {

        $msg = "Passwords are not same";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=Signup.php");

    } else {

        $password = md5($password);
        move_uploaded_file($nic_temp, "./image/$nic");
        move_uploaded_file($nic1_temp, "./image/$nic1");
        $query = "insert into customer(username,password,email,number,address,status,nic,nic1,usertype) ";
        $query .= "values ('{$username}','{$password}', '{$email}','{$number}', '{$address}','{$status}', '{$nic}', '{$nic1}', '{$usertype}')";
        $result = mysqli_query($connection, $query);

        $msg = "Registerd Successfully";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=login.php");

        if (!$result) {
            die('Query Failed' . mysqli_error($connection));
        }
    }
}
