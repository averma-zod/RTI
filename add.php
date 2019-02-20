<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>
	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body>
	<form method="POST" action="Add.php">
	<table align="center" class="table" width="400" height="200">
			<tr>
				<th></th><th></th>
			</tr>
		    <tr>
				<td align="center" colspan="2"><h3><font style="">RTI</font></h3></td>
			</tr>
			<tr>
				<td>Department</td>
				<td>
					<select name="Department">
						<option hidden="">Select</option>
						<option value="Medical">Medical</option>
						<option value="Traffic">Traffic</option>
						<option value="Education">Education</option>
				    </select>
				</td>
			</tr>
			<tr>
				<td>Query</td><td><textarea class="text" name="text" placeholder="Enter Your Query"></textarea></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><button name="Submit">Submit</button></td>
			</tr>
	</table>
	</form>
</body>
</html>