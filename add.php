<?php include("addserver.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>add</title>
	<h2 align="center">Add a query</h2>
</head>
<body>
	<div align="center">
		<form method="POST" action="add.php">
		<font style="font-family: comic sans ms;">Select department:</font>
			<select name="select" required>
				<option hidden>Enter department</option>
				<option value="cs">CS</option>
				<option value="bba">BBA</option>
			</select><br>

			<font style="font-family: comic sans ms; float: left; margin-left: 480px;">Enter Query:</font>
			<textarea style="width: 200px;height:50px;float: left" placeholder="enter query" name="text" required></textarea><br><br><br><br>
			<input type="submit" name="submit" value="submit" id="submit">
		</form>
	</div>
</body>
</html>