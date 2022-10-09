<?php include "db.php"; ?>
<nav id="NAVBAR">
  <div class="oppa">
    <ul>
      <li><a href="./Admin/aProfile.php"> <?php echo $_SESSION['username'] ?></li>
      <li> <a href="./Conreg.php">Register as a Constructor</a> </li>

  </div>

  <ul>
    <li> <a href="index.php">HOME </a></li>
    <li> <a href="./services.php"> SERVICES </a> </li>
    <li> <a href="AboutUs.php"> ABOUT US </a> </li>
    <li> <a href="contactUs.php"> CONTACT US </a> </li>
    <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    ?>
      <li> <a href="profile.php">PROFILE</a> </li>
      <li> <a href="myOrder.php">MY ORDER</a> </li>
      <li> <a href="logout.php">LOGOUT</a> </li>
    <?php } else { ?>

      <div class="dropdown">
        <button class="dropbtn">
          <li> <a href="Login.php">LOGIN</a> </li>
        </button>
        <div class="dropdown-content">
          <li> <a href="ConstructorLogin.php"> </i>Constructor Login</a> </li>
          <li> <a href="Signup.php"> </i>SIGNUP</a> </li>
        </div>
      </div>
    <?php } ?>
  </ul>
</nav>