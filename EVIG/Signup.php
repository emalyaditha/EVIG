<html lang="eng" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="./css/las.css">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<?php include "includes/nav.php"; ?>

</head>

<body>

	<div class="shadow">
		<form class="box" action="SignupF.php" method="post" enctype="multipart/form-data">
			<h1>Sign Up</h1>
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="Conpassword" placeholder="Confirm Password" required>
			<input type="text" name="email" placeholder="Email" required>
			<input type="text" name="number" placeholder="Number" required>
			<input type="text" name="address" placeholder="Address" required>
			<label for="image">
				<h4>Front Image of your NIC
			</label>
			<input type="file" name="nic" required>
			<label for="image">
				<h4>Back Image of your NIC
			</label>
			<input type="file" name="nic1" required>
			<input type="submit" name="submit" value="Sign Up">
		</form>
	</div>

</body>

</html>