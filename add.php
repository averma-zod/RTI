<?php include('Addserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Query</title>
	<link rel="stylesheet" type="text/css" href="Addstyle.css">
</head>
<body>
	
	<header>
        <font  style="margin-left: 20px; font-family: Courier; color:white;"><font style="font-size:3.0em">R</font><font style="font-size:3.5em" color="red">|</font><font style="font-size:3.5em">T</font><font style="font-size:3.5em" color="red">|</font><font style="font-size:3.0em">I</font></font>
        <div class="right-nav">
           <form method="POST" action="addserver.php">
            <button class="navbtn" name="Logout">Logout</button>
           </form>
        </div>
    </header> 

    <div class="navigation" id="nav" style="visibility: visible;">
   
    <div style="margin-left: 10px; margin-top: 20px; height: 100%;">
        <button name="home" style="border:none; color: white; background: black; font-size: 15px;" onclick="home()"><b>Home</b></button>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;" onclick="depart()"><b>Add Department</b></button>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;" onclick="query()"><b>Filter Queries</b></button>
        <div id="query" style="margin-left: 10px; visibility: hidden;">
          <div style="height: 9px;"></div>
          <form method="POST" action="addserver.php">
          <button name="query" value="All Queries" style="border:none; color: white; background: black; font-size: 15px;">All Queries</button><div style="height: 7px;"></div>
          <button name="query" value="Education" style="border:none; color: white; background: black; font-size: 15px;">Education</button><div style="height: 7px;"></div>
          <button name="query" value="Medical" style="border:none; color: white; background: black; font-size: 15px;">Medical</button><div style="height: 7px;"></div>
          <button name="query" value="Traffic" style="border:none; color: white; background: black; font-size: 15px;">Traffic</button><div style="height: 7px;"></div>
        </form>
        </div>
        <div>
          <form method="POST" action="Addserver.php">
          <button name="AccSet" style="bottom: 10px; position: fixed; border:none; color: white; background: black; font-size: 15px;"><?php echo $_SESSION['Username']; ?></button>
         </form>
        </div>
    </div>
  </div>

  <div class="container">
    <div class="data">
	    <h3 align="center">
		  <font style="font-size: 1.4em; font-family: Trebuchet Ms; color:Black">
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
    </div>

    <footer class="footer">
    <br>
      <a href="About.php" style="text-decoration: none; color: white; font-family: Courier;">About</a>
      <a href="Contact.php" style="text-decoration: none; color: red; font-family: Courier;">|  Contact Us  |</a>
      <a href="faq.php" style="text-decoration: none; color: white; font-family: Courier;">FAQ</a>
    </footer>
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