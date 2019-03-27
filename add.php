<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>
	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body>
	<form method="POST" action="Add.php">
	<header>
		<img align="top" style=" border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
		<font  style=" font-size:4.5em; margin-left: 10px; font-family: garamond; color:white">RTI</font>
		<div class="right-nav"><button class="navbtn">About</button><button class="navbtn">FAQ</button><button class="navbtn">Contact</button></div>	  
    </header>

    <div class="navigation">
    	<select class="navibtn" name="Filter">
    	  <option hidden="">Queries</option>
    	  <option value="Medical">Medical</option>
    	  <option value="Education">Education</option>
    	  <option value="Traffic">Traffic</option>
    	</select><br>
    	<button class="navibtn">Account Settings</button><br>
    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	<button class="logbtn" name="Logout">Logout</button>
    </div>
    <div class="data">
	    <h3 align="center">
		  <font style="font-size: 1.4em; font-family: garamond; color:Black">
			Query Submition
		  </font>
	    </h3>

	   &nbsp;Department*
	   <br><br>
		 <select class="select" style="background-color: #DCDCDC" name="Department">
			<option hidden="">Select</option>
			<option value="Medical">Medical</option>
			<option value="Traffic">Traffic</option>
			<option value="Education">Education</option>
		 </select>

		 <br><br><br><br>

	    &nbsp;Query*
	    <br><br>
	     <textarea class="text" name="text" placeholder="Enter Your Query"></textarea>

	     <br><br><br>

	     &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	     &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class="button" name="Submit">Submit</button>
    </form>
    </div>
</body>
</html>