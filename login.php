<?php include('Add.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Login Form
	</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
	<div class="Login">
		<form method="POST" action="Add.php">
			<h2>Login</h2>
			<input type="text" placeholder="Enter Username">
			<input type="text" placeholder="Enter Password">
			<input type="button" onclick="Add.php">
		</form>
	</div>
</body>
</html>