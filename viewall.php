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
	<?php
     session_start();
     $db = mysqli_connect('localhost','root','','rti');
     $name = $_SESSION['Username'];
	 if($name == 'Admin')
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
        </thead>
        <tbody>
            <?php
              while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
              {?><tr><?php
                $q = $row['Query'];
                $r = $row['Department'];
                $p = $row['Date'];
                $s = $row['Status'];
        
            ?>
                <td><?php echo $q; ?></td>
                <td><?php echo $r; ?></td>
                <td><?php echo $p; ?></td>
                <td><?php echo $s; ?></td></tr><?php
              }
              ?>
        </tbody>
    </table>
</body>
</html>