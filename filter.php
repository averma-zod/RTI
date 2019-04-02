<?php
   include('filterserver.php');
   $db = mysqli_connect('localhost','root','','rti');
   $d=$_SESSION['filt'];
   $type = $_SESSION['Type'];
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>viewall</title>
  <link rel="stylesheet" type="text/css" href="filterstyle.css">
</head>


<body style="background-color: white">

  <header>
        <font  style="margin-left: 20px; font-family: Courier; color:white;"><font style="font-size:3.0em">R</font><font style="font-size:3.5em" color="red">|</font><font style="font-size:3.5em">T</font><font style="font-size:3.5em" color="red">|</font><font style="font-size:3.0em">I</font></font>
        <div class="right-nav">
           <form method="POST" action="viewallserver.php">
            <button class="navbtn" name="Logout">Logout</button>
           </form>
        </div>
    </header> 

  <div class="navigation" id="nav" style="visibility: visible;">
   
    <div style="margin-left: 10px; margin-top: 20px; height: 100%;">
        <a href="viewall.php"><button name="home" style="border:none; color: white; background: black; font-size: 15px;" onclick="home()"><b>Home</b></button></a>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;"><b>Add Department</b></button>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;" onclick="query()"><b>Filter Queries</b></button>
        <div id="query" style="margin-left: 10px; visibility: visible;">
          <div style="height: 9px;"></div>
          <form method="POST" action="viewallserver.php">
          <button name="query" value="All Queries" style="border:none; color: white; background: black; font-size: 15px;">All Queries</button><div style="height: 7px;"></div>
          <button name="query" value="Education" style="border:none; color: white; background: black; font-size: 15px;">
            <?php 
              if($d == 'Education')
              {
                ?><font color="red">Education</font><?php
              }
              else
              {
                ?><font color="white">Education</font><?php
              }
              ?>
            </button><div style="height: 7px;"></div>
          <button name="query" value="Medical" style="border:none; color: white; background: black; font-size: 15px;">
            <?php 
              if($d == 'Medical')
              {
                ?><font color="red">Medical</font><?php
              }
              else
              {
                ?><font color="white">Medical</font><?php
              }
              ?>
          </button><div style="height: 7px;"></div>
          <button name="query" value="Traffic" style="border:none; color: white; background: black; font-size: 15px;">
            <?php 
              if($d == 'Traffic')
              {
                ?><font color="red">Traffic</font><?php
              }
              else
              {
                ?><font color="white">Traffic</font><?php
              }
              ?>
          </button><div style="height: 7px;"></div>
        </form>
        </div>

        <form method="POST" action="filterserver.php">
          <button name="AccSet" style="bottom: 10px; position: fixed; border:none; color: white; background: black; font-size: 15px;"><?php echo $_SESSION['Username']; ?></button>
        </form>
    </div>
  </div>

<form method="POST" action="viewall.php">
  <?php
     session_start();
     $db = mysqli_connect('localhost','root','','rti');
     $type = $_SESSION['Type'];
     $name = $_SESSION['Username'];
     if($type == 'Admin')
     {
        
   $query = "SELECT * FROM Query WHERE Department='$d'";
        $sql = mysqli_query($db,$query);  
     }

     else
     {
        $query = "SELECT * FROM Query WHERE Name='$name'";
        $sql = mysqli_query($db,$query);
     }
  ?>

    <table align="left" style=" width:89.3%; margin-left: 160px; margin-top: 30px">
      <thead style="background: #343434; color: white;">
        <th width="30%;"><font style="font-family: Trebuchet Ms;">Query</font></th>
        <th width="10%;"><font style="font-family: Trebuchet Ms;">Department</font></th>
        <th width="10%;"><font style="font-family: Trebuchet Ms;">Date</font></th>
        <th width="10%;"><font style="font-family: Trebuchet Ms;">Status</font></th>
        <th width="40%;"><font style="font-family: Trebuchet Ms;">Answer</font></th>
        <?php
          if($type == 'Admin')
          {
            ?><th style="font-family: Trebuchet Ms; width: 120px;">Reply</th><?php
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
        
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Query; ?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Department; ?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Date; ?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Status;?></font></td>
            <td><font style="font-family: Trebuchet Ms;"><?php echo $Answer; ?></font></td>
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