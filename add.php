<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body style="background-color:white">
 <form method="POST" action="Add.php">
	<div>


		<div style=" width: all;background-color: black; height: 150px; border-radius: 10px ;background-image: linear-gradient(to right,black)">

	      <button class="logout" name="logout">LogOut</button>

			<img align="middle" style=" box-shadow: 4px 2px 2px lightgrey; border-radius: 50%; margin-left:0%; width: 150px;height: 150px" src="RTI.png">
			<font  style=" font-size:4.5em; font-family: garamond; color:white">RTI</font>
			


  		</div>



	 <table align="center" class="table" width="45%" height="400px">
			<tr>
				<th></th><th></th>
			</tr>
		    <tr>
				<td align="center" colspan="2">
					<h3>
						<font style="font-size: 1.4em; font-family: garamond; color:Black">
						Query Submition
						</font>
					</h3>
				</td>
			</tr>
			<tr>
				<td style="font-family: bookman;font-size: 1.2em">Department</td>
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
				<td style="font-family: bookman;font-size: 1.2em">Query</td><td><textarea class="text" name="text" placeholder="Enter Your Query" required></textarea></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><button class="button" name="Submit">Submit</button></td>
			</tr>
	</table>
</div>
	</form>
</body>
</html>