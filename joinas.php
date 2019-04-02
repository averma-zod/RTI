<!DOCTYPE html>
<html>
<head>
	<title>RTI</title>
	<link rel="stylesheet" type="text/css" href="joinasstyle.css">
</head>
<body background="back.jpg">
	<form method="POST" action="joinas.php">
	<header>
        <font  style="margin-left: 20px; font-family: Courier; color:white;"><font style="font-size:3.0em">R</font><font style="font-size:3.5em" color="red">|</font><font style="font-size:3.5em">T</font><font style="font-size:3.5em" color="red">|</font><font style="font-size:3.0em">I</font></font>
    </header>  

    <div class="middle">
    <table>
      <tbody>
      	<tr>
      		<td colspan="2"><font size="6" style="margin-left: 64%; font-family: Trebuchet Ms;">Login</font></td>
      	</tr>
      	<tr>
      		<td colspan="2">
      			<select class="select" name="joinAs">
			      <option value="As Admin">ADMIN</option>
		    	  <option value="As Genral user">USER</option>
	            </select>
	        </td>
      	</tr>
        <tr>
          <td width="160px;"><font style="font-family: Courier;" size="5px;">Username</font></td><td><input class="inputfield" type="text" name="Name" placeholder="Enter Username"></td>
        </tr>
        <tr>
          <td><font style="font-family: Courier;" size="5px;">Password</font></td><td><input class="inputfield" type="Password" name="Password" placeholder="Enter Password"></td>
        </tr>
        <tr style="height: 20px;">
        	
        </tr>
        <tr>
          <td colspan="2"><input class="btn" type="Submit" name="Submit" Value="Login"></td>
        </tr>
      </tbody>
    </table>
   </div>

 <footer class="footer">
	<br>
	<a href="About.php" style="text-decoration: none; color: white; font-family: Courier;">About</a>
	<a href="Contact.php" style="text-decoration: none; color: red; font-family: Courier;">|  Contact Us  |</a>
	<a href="faq.php" style="text-decoration: none; color: white; font-family: Courier;">FAQ</a>
 </footer>

 </form>
</body>
</html>


<?php
	$db = mysqli_connect('localhost','root','','RTI');
  	session_start();

	if (isset($_POST['Submit'])) 
	{
		if($_POST['joinAs']== "As Admin")
		{
			$Username=$_POST['Name'];
	    	$Password=$_POST['Password'];
	    	$sql= mysqli_query($db,"SELECT * FROM Admin");

	    	while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
	    	{
	    		if($Username == $row['Name'])
		  		{
		  		  if($Password == $row['Password'] )
		     	  {
			         $_SESSION['Type']='Admin';
			         $_SESSION['Username']=$Username;
			         header('Location:viewall.php');
	  			  }
	      		  else
			      {
			        ?>
			  	      <script>
                        window.alert("Incorrect Password");
                      </script>
                    <?php
			      }
			    }
			    else
			    {
			      ?>
			  	    <script>
                      window.alert("Admin Does Not Exists");
                    </script>
                  <?php
			    }
	  		}
	  	}
	  	else if($_POST['joinAs']== "As Genral user")	
	  	{
	  		$Username=$_POST['Name'];
	    	$Password=$_POST['Password'];
	    	$sql= mysqli_query($db,"SELECT * FROM User");

	    	while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
	    	{
	    		if($Username == $row['Name'])
		  		{
		  		  if($Password == $row['Password'] )
		     	  {
			         $_SESSION['Type']='User';
			         $_SESSION['Username']=$Username;
			         header('Location:add.php');
	  			  }
	      		  else
			      {
			         ?>
			  	      <script>
                        window.alert("Incorrect Password");
                      </script>
                    <?php
			      }
			    }
			    else
			    {
			    	?>
			  	    <script>
                      window.alert("User Does Not Exists");
                    </script>
                    <?php
			    }
	  		}
	  	}
	}



    if(isset($_POST['about']))
    {
        header('Location:About.php');	
    }

    if(isset($_POST['faq']))
    {
        header('Location:Faq.php');	
    }

    if(isset($_POST['contact']))
    {
        header('Location:Contact.php');	
    }
?>