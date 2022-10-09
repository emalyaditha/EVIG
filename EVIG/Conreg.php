<html>
<title>Register</title>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <link rel="stylesheet" type="text/css" href="./css/nav.css">
  <link rel="stylesheet" type="text/css" href="./css/footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

  <?php include "includes/nav.php"; ?>

  <form action="ConregF.php" method="post" enctype="multipart/form-data">
    <div class="container2">
      <h1>
        <center>Register as a Constructor</center>
      </h1>
      <hr>
      <label>Firstname:</label>
      <input type="text" id="FName" name="firstname" placeholder="Firstname" size="5" required />
      <label>Lastname:</label>
      <input type="text" id="LName" name="lastname" placeholder="Lastname" required />
      <br>
      <br>
      <label for="Fileds">Fileds:</label>
      <select name="fileds" id="Fileds">
        <option value="Mason&Concrete Finisher">Mason&Concrete Finisher</option>
        <option value="Landscaping">Landscaping</option>
        <option value="Electrician">Electrician</option>
        <option value="Plumber">Plumber</option>
        <option value="Carpenter">Carpenter</option>
      </select>
      <br>
      <br>
      <label> Password: </label>
      <input type="password" id="pass" name="password" placeholder="Password" size="5" required>
      <label> Email: </label>
      <input type="text" id="Email" name="email" placeholder="Email" size="5" required>
      <label> Qualifications (No of Years) : </label>
      <input type="text" id="Qualifications" name="quali" placeholder="Qualifications" size="5" required>
      <label> Phone : </label>
      <input type="text" id="number" name="phone" placeholder="phone no." size="10" required>
      Location :
      <textarea cols="80" rows="5" name="address" placeholder="Location" value="address" required>
</textarea>
      <br>
      <br>
      <label>NIC Number : </label>
      <input type="text" id="NIC" name="nic" placeholder="NIC" size="5" required>
      <label> Image of your NIC Front </label>
      <br>
      <h7><input type="file" name="nic1"></h7>
      <br>
      <br>
      <label> Image of your NIC Back </label>
      <br>
      <h7><input type="file" name="nic2"></h7>
      <br>
      <br>
      <label>Cover Image</label>
      <br>
      <h7><input type="file" name="Cover"></h7>
      <br>
      <br>
      <button type="submit" name="submit" class="registerbtn">Register</button>
    </div>
  </form>
</body>

</html>