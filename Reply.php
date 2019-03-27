<?php
   session_start();
   $id = $_SESSION['ii'];
   echo $id;
   $db = mysqli_connect('localhost','root','','rti');

   $query = "SELECT * FROM Query where id = '$id'";
   $sql = mysqli_query($db,$query);

   $row = $sql->fetch_assoc();

   $Status = $row['Status'];
   $Query = $row['Query'];
   $Department = $row['Department'];
   $Date = $row['Date'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Reply</title>
</head>
<body>
    <form method="POST" action="Reply.php">
 	  Query:<?php echo $Query;?><br>
	  Department:<?php echo $Department;?><br>
	  Date:<?php echo $Date;?><br>

	  <?php
	    if($Status == 'Unsolved')
        {
       	  ?>Reply<br>
       	   <table>
       	     <tr><td><input type="text" name="Reply"></td></tr>
       	     <tr><td><button value="Unsolved" name="Update">Update</button></td></tr>
       	   </table>
       	  <?php
        }
        if($Status == 'Solved')
        {
       	  ?><table>
       	  	<tr><td><?php echo $row['Answer']; ?></td><td><input type="text" name="Reply"></td></tr>
       	    <tr><td><button name="NoChange">No Change</button></td><td><button name="Update">Update</button></td></tr>
       	  </table><?php
        }
      ?>
     </form>
</body>
</html>

<?php
   if(isset($_POST['Update']))
   {
   	 $Rep = $_POST['Reply'];
   	 $query = "UPDATE query SET Answer='$Rep',Status='Solved' WHERE id='$id'";
   	 mysqli_query($db,$query);
     header('Location:viewall.php');
   }
   if (isset($_POST['NoChange'])) 
   {
   	 header('Location:viewall.php');
   }
?>