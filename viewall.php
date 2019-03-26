<!DOCTYPE html>
<html>
<head>
	<title>viewall</title>
	<style>
        table,th,tr,td{
            border:1px solid #483D8B;
            border-collapse: collapse;
            padding:5px 100px 1px 10px;
        }
    </style>
    <h1 align="center" style="font-family: garamond">List of all Queries</h1>
</head>
<body style="background-color: #E6E6FA">
<form method="POST" action="viewall.php">
	<?php
     session_start();
     $db = mysqli_connect('localhost','root','','rti');
     $type = $_SESSION['Type'];
     $name = $_SESSION['Username'];
	 if($type == 'Admin')
     {
        $query = "SELECT * FROM Query";
        $sql = mysqli_query($db,$query);
     }
     else
     {
        $query = "SELECT * FROM Query WHERE Name='$name'";
        $sql = mysqli_query($db,$query);
     }
    ?>
    <table align="center" style="margin-top: 20px">
        <thead>
            <th>Query</th>
            <th>Department</th>
            <th>Date</th>
            <th>Status</th>
            <th>Answer</th>
            <?php
               if($type == 'Admin')
               {
               	 ?><th>Reply</th><?php
               }
            ?>
        </thead>
        <tbody>
            <?php
              while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
              {
              	?>
              	<tr>
              	  <?php
                    $Query = $row['Query'];
                    $Department = $row['Department'];
                    $Date = $row['Date'];
                    $Status = $row['Status'];
                    $Answer = $row['Answer'];
                    $id = $row['id'];
                  ?>
        
                  <td><?php echo $Query; ?></td>
                  <td><?php echo $Department; ?></td>
                  <td><?php echo $Date; ?></td>
                  <td><?php echo $Status; ?></td>
                  <td><?php echo $Answer; ?></td>
                  <td><?php
                    if($type == 'Admin')
                    {
                 	   if($Status == 'Unsolved')
                 	   {
                 		 ?><button value="<?=$id ?>" name="Usolve">Reply</button><?php
                 	   }
                 	   elseif ($Status == 'Solved') 
                 	   {
                 		 ?><button value="<?=$id ?>" name="Solve">Change</button><?php
                 	   }
                    }
                  ?></td>
                </tr>
                <?php
               }
            ?>
        </tbody>
    </table>
    </form>
</body>
</html>


<?php
   if(isset($_POST['Usolve']))
   {
   	 $_SESSION['id']=$_POST['Usolve'];
   	 header('Location:Reply.php');
   }
   else if(isset($_POST['Solve']))
   {
   	 $_SESSION['id']=$_POST['Solve'];
   	 header('Location:Reply.php');
   }
?>