<?php include "../db.php"; ?>
<div class="wrapper">
    <div class="sidebar">
        <h2>ADMIN</h2>
        <ul>
           <li><b><a href="../index.php"> <?php echo $_SESSION['username'] ?></b></li>
            <li><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="aProfile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="git.php"><i class="fas fa-tasks"></i>Get in Touch</a></li>
            <li><a href="plans.php"><i class="fas fa-tasks"></i>Manage Plans</a></li>
            <li><a href="viewCustomer.php"><i class="fas fa-tasks"></i>Manage View Customer</a></li>
            <li><a href="viewConstructor.php"><i class="fas fa-tasks"></i></i>Manage View Constructor</a></li>
            <?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
{
?> 
       
       <li> <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a> </li>
     <?php } ?>
        </ul> 
    </div>
</div>
