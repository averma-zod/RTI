<?php
   include('addserver.php');
   $db = mysqli_connect('localhost','root','','rti');
   $d= $_SESSION['filt'];
   $type=$_SESSION['Type'];


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>viewall</title>
  <link rel="stylesheet" type="text/css" href="viewallstyle.css">
</head>


<body style="background-color: white">

  <header>
    <img align="top" style="border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
    <font  style="font-size:4.5em; margin-left: 10px; font-family: garamond; color:black;">RTI</font>
    <div class="right-nav"><button class="navbtn" name="about">About</button><button class="navbtn" name="faq">FAQ</button><button class="navbtn" name="contact">Contact</button></div>
  </header>

  <div class="navigation" id="nav" style="visibility: visible;">
   
    <div style="margin-left: 10px; margin-top: 20px; height: 100%; text-align: left ;">
        <form method="POST" action="add.php">
      <button name="Home" class="navigbtn"style="border:none; color: white; background: black; font-size: 15px;">Home</button><br>
    </form>
        <div style="height: 9px;"></div>
        <button class="navigbtn" style="border:none; color: white; background: black; font-size: 15px;">Add Department</button>
        <div style="height: 9px;"></div>
        <button class="navigbtn" style="border:none; color: white; background: black; font-size: 15px;" onclick="query()">Filter Queries</button>
        <div id="query" style="margin-left: 10px; visibility: hidden;">
          <div style="height: 9px;"></div>
          <form method="POST" action="addserver.php">
          <button name="query" value="All Queries" style="border:none; color: white; background: black; font-size: 15px;">All Queries</button><div style="height: 7px;"></div>
          <button name="query" value="Education" style="border:none; color: white; background: black; font-size: 15px;">Education</button><div style="height: 7px;"></div>
          <button name="query" value="Medical" style="border:none; color: white; background: black; font-size: 15px;">Medical</button><div style="height: 7px;"></div>
          <button name="query" value="Traffic" style="border:none; color: white; background: black; font-size: 15px;">Traffic</button><div style="height:7px;"></div>
        </form>
        
        </div>
        <div style="height: 54%;">
          
        </div>

        <form method="POST" action="add.php">
          <button name="Logout" style="position: fixed; border:none; color: white; background: black; font-size: 15px;"><b>Logout</b></button>
        </form>
    </div>
  </div>

<form method="POST" action="userfilter.php">
  <?php
     
     $db = mysqli_connect('localhost','root','','rti');
     $name = $_SESSION['Username'];

     if($d=='All Queries')
     {
        $query = "SELECT * FROM Query WHERE Name='$name'";
          $sql = mysqli_query($db,$query);    
        }
        else{
       if($type == 'User')
       {
          
          $query = "SELECT * FROM Query WHERE Department='$d' AND Name='$name'";
          $sql = mysqli_query($db,$query);  
       }
     }

  ?>

    <table align="left" style=" width:89.3%; margin-left: 160px; margin-top: 83px">
      <thead>
        <th><font style="font-family: Trebuchet Ms;">Query</font></th>
        <th><font style="font-family: Trebuchet Ms;">Department</font></th>
        <th><font style="font-family: Trebuchet Ms;">Date</font></th>
        <th><font style="font-family: Trebuchet Ms;">Status</font></th>
        <th width="19%;"><font style="font-family: Trebuchet Ms;">Answer</font></th>
        
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
            ?>
        
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Query; ?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Department; ?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Date; ?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Status;?></font></td>
            <td style="text-align: center;"><font style="font-family: Trebuchet Ms;"><?php echo $Answer; ?></font></td>
           </tr>
           <?php
            }
           ?>
        </tbody>
      </table>
    </form>
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
  function date() 
  {
        var y = document.getElementById("date");
        if (y.style.visibility === "visible") 
        {
            y.style.visibility = "hidden";
        } 
        else 
        {
            y.style.visibility = "visible";
        }
  }
</script>