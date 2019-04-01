<?php include('viewallserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>viewall</title>
  <link rel="stylesheet" type="text/css" href="viewallstyle.css">
</head>


<body style="background-color: white">

  <header>
    <img align="top" style="border-radius: 50%; margin-left:10px;margin-top:10px; width: 60px;height: 60px" src="RTI.png">
    <font  style="font-size:4.5em; margin-left: 10px; font-family: Courier; color:black;">RTI</font>
    <div class="right-nav"><form method="POST" action="viewallserver.php"><button class="navbtn" name="Logout">Logout</button></form></div>
  </header>

  <div class="navigation" id="nav" style="visibility: visible;">
   
    <div style="margin-left: 10px; margin-top: 20px; height: 100%;">
        <button name="home" style="border:none; color: white; background: black; font-size: 15px;" onclick="home()"><b>Home</b></button>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;"><b>Add Department</b></button>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;" onclick="query()"><b>Filter Queries</b></button>
        <div id="query" style="margin-left: 10px; visibility: hidden;">
          <div style="height: 9px;"></div>
          <form method="POST" action="viewallserver.php">
          <button name="query" value="All Queries" style="border:none; color: white; background: black; font-size: 15px;">All Queries</button><div style="height: 7px;"></div>
          <button name="query" value="Education" style="border:none; color: white; background: black; font-size: 15px;">Education</button><div style="height: 7px;"></div>
          <button name="query" value="Medical" style="border:none; color: white; background: black; font-size: 15px;">Medical</button><div style="height: 7px;"></div>
          <button name="query" value="Traffic" style="border:none; color: white; background: black; font-size: 15px;">Traffic</button><div style="height: 7px;"></div>
        </form>
        <button style="border:none; color: white; background: black; font-size: 15px;" onclick="date()">Date</button><div style="height: 7px;"></div>
        <form method="POST" action="viewallserver.php">
          <div id="date" style="margin-left: 10px; visibility: hidden;">
             <button name="query" value="98" style="border:none; color: white; background: black; font-size: 15px;">2019-2018</button><div style="height: 7px;"></div>
             <button name="query" value="87" style="border:none; color: white; background: black; font-size: 15px;">2018-2017</button><div style="height: 7px;"></div>
             <button name="query" value="76" style="border:none; color: white; background: black; font-size: 15px;">2017-2016</button><div style="height: 7px;"></div>
          </div>
        </form>
        </div>
        <div style="height: 42%;">
          
        </div>
        <div>
          <form method="POST" action="viewallserver.php">
           <button name="accset" style="font-family: Trebuchet Ms; border:none; color: white; background: black; font-size: 15px;"><?php echo $_SESSION['Username']?></button><div style="height: 7px;"></div>
         </form>
        </div>
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
        <th width="30%;"><font style="font-family: Trebuchet Ms;">Query</font></th>
        <th width="10%;"><font style="font-family: Trebuchet Ms;">Department</font></th>
        <th width="10%;"><font style="font-family: Trebuchet Ms;">Date</font></th>
        <th width="10%;"><font style="font-family: Trebuchet Ms;">Status</font></th>
        <th width="40%;"><font style="font-family: Trebuchet Ms;">Answer</font></th>
        <?php
          if($type == 'Admin')
          {
            ?><th width="120px;"><font style="font-family: Trebuchet Ms;">Reply</font></th><?php
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
        
            <td style="text-align: center;"><font style="font-family: Trebuchet Ms;"><?php echo $Query; ?></font></td>
            <td style="text-align: center;"><font style="font-family: Trebuchet Ms;"><?php echo $Department; ?></font></td>
            <td style="text-align: center;"><font style="font-family: Trebuchet Ms;"><?php echo $Date; ?></font></td>
            <td style="text-align: center;"><font style="font-family: Trebuchet Ms;"><?php echo $Status;?></font></td>
            <td style="text-align: center;"><font style="font-family: Trebuchet Ms;"><?php echo $Answer; ?></font></td>
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

  <footer class="footer">
    <br>
    <a href="about.php" style="text-decoration: none; color: white; font-family: Courier;">About  |</a>
    <a href="contact.php" style="text-decoration: none; color: white; font-family: Courier;">Contact Us  |</a>
    <a href="faq.php" style="text-decoration: none; color: white; font-family: Courier;">FAQ</a>
 </footer>
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