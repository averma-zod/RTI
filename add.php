<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>

	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body style="background-color:#110D21">
	<form method="POST" action="Add.php">
		
		<div style="background-color:#110D21; width:100%;height: 450px ;border-radius:10px; padding-top:1px; margin-top:4%;">
		<div style="background-color: none">
	      <font style="margin-left: 49%;font-size: 1.8em; font-family: garamond; color:#D0C8F2;">RTI</font>
	      <a href="viewall.php" style="float: right;font-size: 1.7em; font-family: garamond; color:#D0C8F2;">View Queries</a>
  		</div>
	 <table align="center" class="table" width="400" height="200">
			<tr>
				<th></th><th></th>
			</tr>
		    <tr>
				<td align="center" colspan="2">
					<h3>
						<font style="font-size: 1.2em; font-family: garamond; color:#E4E2EE">
						Query Submition 
						</font>
					</h3>
				</td>
			</tr>
			<tr>
				<td style="font-family: bookman;font-size: 1.1em">Department</td>
				<td>
					<select class="select" style="background-color: #DCDCDC" name="Department" required>
						<option hidden="">Select</option>
						<option value="Medical">Medical</option>
						<option value="Traffic">Traffic</option>
						<option value="Education">Education</option>
				    </select>
				</td>
			</tr>
			<tr>
				<td style="font-family: bookman;font-size: 1.1em">Query</td><td><textarea class="text" name="text" placeholder="Enter Your Query" required></textarea></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><button class="button" name="Submit">Submit</button></td>
			</tr>
	</table>
</div>
	</form>
</body>
</html>