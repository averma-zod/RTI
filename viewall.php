<?php include('viewallserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>viewall</title>
	<style>
      table,th,tr,td{
          border:1px solid #483D8B;
          border-collapse: collapse;
          padding:5px 100px 1px 10px;
  </style>
</head>


<body style="background-color: white">
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

    <form method="POST" action="viewall.php">

    <table align="left" style=" margin-left: 10px; margin-top: 10px">
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
                  <td><?php echo $Status;?></td>
                  <td><?php echo $Answer; ?></td>
                  <td ><?php
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