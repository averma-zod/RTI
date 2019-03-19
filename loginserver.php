<?php
  $db = mysqli_connect('localhost','root','','RTI');
  session_start();
  
  if(isset($_POST['Submit']))
  {
  	$Username=$_POST['Name'];
    $Password=$_POST['Password'];
  	if($Username == 'Admin')
  	{
  		if($Password == 'Admin')
      {
        $_SESSION['Username']='Admin';
        header('Location:add.php');
      }
      else
      {
        echo "Incorrect Admin Password";
      }
  	}
  	elseif ($Username != 'Admin')
  	{
  		$sql = "SELECT * FROM admin WHERE Name='$Username'";
  		$result = mysqli_query($db,$sql);
        $number=$result->num_rows;
        if($number == 1)
        {
           $row = $result->fetch_assoc();
           $pass = $row["Password"];
           $Password =md5($Password);
           if($pass == $Password)
           {
            $_SESSION['Username']=$Username;
        	  header('Location:add.php');
           }
           else
           {
              echo 'Incorrect Password';
           }
        }
        else
        {
           echo 'User Do Not Exist';
        }
  	}
  }
?>