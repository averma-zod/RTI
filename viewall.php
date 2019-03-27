<?php include('viewallserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>viewall</title>
  <link rel="stylesheet" type="text/css" href="viewallstyle.css">
</head>


<body style="background-color: white">

  <form method="POST" action="viewall.php">

  <header>
    <img align="top" style="border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
    <font  style="font-size:4.5em; margin-left: 10px; font-family: garamond; color:white">RTI</font>
    <div class="right-nav"><button class="navbtn" name="about">About</button><button class="navbtn" name="faq">FAQ</button><button class="navbtn" name="contact">Contact</button></div>  
  </header>

  <div class="navigation">
    <button class="navibtn" name="Home">Home</button><br>
    <select class="navibtn" name="Filter">
      <option hidden="">Queries</option>
      <option value="Medical">Medical</option>
      <option value="Education">Education</option>
      <option value="Traffic">Traffic</option>
    </select><br>
    <button class="navibtn">Account Settings</button><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button class="logbtn" name="Logout">Logout</button>
  </div>

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

    <table align="left" style=" width:89.3%; margin-left: 160px; margin-top: 40px">
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
            <td align="center" >
            <?php
              if($type == 'Admin')
              {
                if($Status == 'Unsolved')
                {
                  ?><button value="<?=$id ?>" class="reply" name="Usolve">Reply</button><?php
                }
                elseif ($Status == 'Solved') 
                {
                 	?><button value="<?=$id ?>" class="change" name="Solve">Change</button><?php
                }
              }
            ?>
            </td>
           </tr>
           <?php
            }
           ?>
        </tbody>
      </table>
    </form>
</body>
</html>