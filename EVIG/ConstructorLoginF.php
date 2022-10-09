<?php include "db.php"; ?>
<?php
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $DB_email = "";
    $DB_password = "";

    $password = md5($password);

    $query = "select * from Constructor where email ='{$email}' and status='Active' ";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {

        die("query failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

        $DB_email = $row['email'];
        $DB_password = $row['password'];
        
    }
    if ($email !== $DB_email && $password !== $DB_password) {
        $msg = "Login Failed";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh:0; url=ConstructorLogin.php");
    }
    else if ($email === $DB_email && $password === $DB_password) {
        $_SESSION['email'] = $DB_email;
        // $_SESSION['usertype'] = $DB_user_role;

        $msg = "Login Succses";
        echo "<script type='text/javascript'>alert('$msg');</script>"; 
        header("refresh:0; url=./Constructor/cProfile.php");
    } else {
        $msg = "Login Failed";
        echo "<script type='text/javascript'>alert('$msg');</script>"; 
        header("refresh:0; url=ConstructorLogin.php");
    }
}

?>

