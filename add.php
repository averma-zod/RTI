<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>
	<style>
		button{
			  background: #778899;
			  border-radius: 4px;
			  box-shadow: 2px 5px 2px #2F4F4F;
			  color: white;
			  padding: 10px 24px;
			  margin: 10px 0 0 0;
			  outline: 0;
			  border: 0;
			  transition: all .1s linear;
		}
		button:active {
		  box-shadow: 0 2px 0 #2F4F4F;
		  transform: translateY(3px);
}

	</style>

	<h1 align="center" style="font-family: garamond; color: #2F4F4F">RTI</h1>

	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body style="background-color: #E6E6FA">
	<form method="POST" action="Add.php">
		
		<div align="center" 
		style="background-color: 	#ADD8E6 ;width:650px; margin-left:23%;
		margin-right: 22%;height: 380px ;border-radius: 10px; padding-top:1px">

	<table align="center" class="table" width="400" height="200">
			<tr>
				<th></th><th></th>
			</tr>
		    <tr>
				<td align="center" colspan="2"><h3><font style="font-size: 1.2em; font-family: garamond; color: #2F4F4F">Query Submition</font></h3></td>
			</tr>
			<tr>
				<td style="font-family: bookman;font-size: 1.1em">Department</td>
				<td>
					<select style="background-color: #DCDCDC" name="Department" required>
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
				<td align="center" colspan="2"><button name="Submit">Submit</button></td>
			</tr>
	</table>
</div>
	</form>
</body>
</html>