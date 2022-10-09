<html lang="eng" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="./css/las.css">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<?php include "includes/nav.php"; ?>
</head>

<body>
	<div class="shadow">
		<form class="box" action="ConstructorLoginF.php" method="post">
			<h1>Constructor Login</h1>
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="login" value="Login">
		</form>
	</div>

</body>

</html>