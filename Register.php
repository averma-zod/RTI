<?php include('RegisterServer.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form method="POST" action="Register.php">
	  <table>
	    <tbody>
	    	<tr>
	    		<th>Username</th><th><input type="text" name="Name" placeholder="Enter Username"></th>
	    	</tr>
	    	<tr>
	    		<th>Email</th><th><input type="Email" name="Email" placeholder="Enter Email"></th>
	    	</tr>
	    	<tr>
	    		<th>Gender</th><th><input type="radio" name="Gender" value="Male" checked> Male
                                   <input type="radio" name="Gender" value="Female"> Female</th>
	    	</tr>
	    	<tr>
	    		<th>Password</th><th><input type="Password" name="Password" placeholder="Enter Password"></th>
	    	</tr>
	    	<tr>
	    		<th>Confirm Password</th><th><input type="Password" name="CPassword" placeholder="Enter Password Again"></th>
	    	</tr>
	    	<tr>
	    		<th colspan="2"><input type="Submit" name="Submit" value="Register"></th>
	    	</tr>
	    </tbody>	
      </table>
    </form>
</body>
</html>