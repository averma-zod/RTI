<!DOCTYPE html>
<html>
<head>
	<title>RTI</title>
</head>
<body>
	<form method="POST" action="joinas.php">
		<select name="joinAs">
			<option value="As Admin">ADMIN</option>
			<option value="As Genral user">USER</option>
		</select>
    <table>
      <tbody>
        <tr>
          <td>Username</td><td><input type="text" name="Name" placeholder="Enter Username"></td>
        </tr>
        <tr>
          <td>Password</td><td><input type="Password" name="Password" placeholder="Enter Password"></td>
        </tr>
         <tr>
          <td colspan="2"><input type="Submit" name="Submit" Value="Login"></td>
        </tr>
      </tbody>
    </table>
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
			         header('Location:viewall.php');
	  			  }
	      		  else
			      {
			         echo "Incorrect Admin Password";
			      }
			    }
			    else
			    {
			  	  echo "User Does not Exist";
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
			         echo "Incorrect Admin Password";
			      }
			    }
			    else
			    {
			  	  echo "User Does not Exist";
			    }
	  		}
	  	}
	}
