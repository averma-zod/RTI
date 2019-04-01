<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>
	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body>
	
	<header>
		<img align="top" style=" border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
		<font  style=" font-size:4.5em; margin-left: 10px; font-family: garamond; color:black">RTI</font>
		<div class="right-nav"><button class="navbtn" name="about">About</button><button class="navbtn" name="faq">FAQ</button><button class="navbtn" name="contact">Contact</button></div> 	  
    </header>

    <div class="navigation">
      <form method="POST" action="add.php">
    	<button name="Home" class="navibtn">Home</button><br>
    </form>
    	
    	<button class="navibtn" onclick="query()">Filter Queries</button>

    	<div id="query" style="margin-left: 10px; visibility: hidden;">
          <div style="height: 9px;"></div>
          <form method="POST" action="addserver.php">
          <button name="query" value="All Queries" style="border:none; color: white; background: black; font-size: 15px;">All Queries</button><div style="height: 7px;"></div>
          <button name="query" value="Education" style="border:none; color: white; background: black; font-size: 15px;">Education</button><div style="height: 7px;"></div>
          <button name="query" value="Medical" style="border:none; color: white; background: black; font-size: 15px;">Medical</button><div style="height: 7px;"></div>
          <button name="query" value="Traffic" style="border:none; color: white; background: black; font-size: 15px;">Traffic</button><div style="height: 72px;"></div>
        </form>
</div>


    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	<button class="navibtn" name="Logout">Logout</button>
    </div>
    <div class="data">
	    <h3 align="center">
		  <font style="font-size: 1.4em; font-family: garamond; color:Black">
			Query Submition
		  </font>
	    </h3>
	    <form method="POST" action="Add.php">
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

<script type="text/javascript">
  function query() 
  {
        var y = document.getElementById("query");
        var x = document.getElementById("date");
        if (y.style.visibility === "visible") 
        {
            y.style.visibility = "hidden";
            x.style.visibility = "hidden";
        } 
        else 
        {
            y.style.visibility = "visible";
        }
  }
  </script>