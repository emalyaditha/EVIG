<?php include "db.php";
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $DB_username = "";

    $password = md5($password);
    

    $query = "select * from customer where username ='{$username}' and status='Active' ";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {

        die("query failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

        $DB_username = $row['username'];
        $DB_password = $row['password'];
        $DB_usertype = $row['usertype'];       

    }
    if ($username !== $DB_username && $password !== $DB_password) {
        $msg = "Username or password is not Valid";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=login.php");
                     
    } else if ($username == $DB_username && $password == $DB_password){
        $msg = "Login Succses";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=./Admin/aProfile.php");
        $_SESSION['username'] = $DB_username;
        $_SESSION['password'] = $DB_password;
        $_SESSION['usertype'] = $DB_usertype;
        
        
    } else {
        $msg = "Login Failed";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=login.php");
    }
}


