<?php
   session_start();
   $id = $_SESSION['ii'];
   $db = mysqli_connect('localhost','root','','rti');


  if($_SESSION['Type'] == 'User')
  {
    header('Location:add.php');
  }
   if($_SESSION['Username'] == '')
  {
    header('Location:joinas.php');
  }

  if($_SESSION['ii'] == '')
  {
    header('Location:viewall.php');
  }

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
    <link rel="stylesheet" type="text/css" href="Replystyle.css">
    <style type="text/css">
      table,tr,td{  
        padding: 20px 150px 10px 10px;
      }
    </style>
</head>
<body>
  
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
        <a href="viewall.php"><button name="home" style="border:none; color: white; background: black; font-size: 15px;"><b>Home</b></button></a>
        <div style="height: 9px;"></div>
        <button style="border:none; color: white; background: black; font-size: 15px;" onclick="depart()"><b>Add Department</b></button>
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
        </div>
        <div style="height: 58%;">
          
        </div>
        <div>
          <form method="POST" action="viewallserver.php">
           <button name="accset"  style="font-family: Trebuchet Ms; border:none; color: white; background: black; font-size: 15px;"><?php echo $_SESSION['Username']?></button><div style="height: 7px;"></div>
         </form>
        </div>
    </div>
  </div>



 <form method="POST" action="Reply.php">
  

  <div class="container">
    <table>
      <tr align="left">
        <td width="150px;"><font style=" font-size: 1.2em; font-family: garamond">Query:</font></td>
        <td><font style="font-weight: bold;color:slateblue;font-size: 1.2em; font-family: garamond"><?php echo $Query;?></font></td>
      </tr>
      <tr align="left">
        <td><font style="font-size: 1.2em; font-family: garamond;">Department:</font></td>
        <td><font style="font-weight: bold;color:black;font-size: 1.2em; font-family: garamond"><?php echo $Department;?></font></td>
      </tr>
      <tr align="left">
        <td><font style="font-size: 1.2em; font-family: garamond">Date:</font></td>
        <td><font style="font-weight: bold;color:black;font-size: 1.2em; font-family: garamond"><?php echo $Date;?></font></td>
      </tr>
      <tr>
        <td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td>
      </tr>
    <?php
      if($Status == 'Unsolved')
      {
        ?>
           	<tr>
              <td colspan="2"><textarea class="textt" name="Reply" placeholder="Enter Answer"></textarea></td>
            </tr>
           	<tr>
              <td colspan="2"><button class="button" value="Unsolved" name="Update">Update</button></td>
            </tr>
          </table>
        <?php
      }
      if($Status == 'Solved')
      {
        ?>
            <tr>
              <td width="400px;"><font style="font-weight: bold;color:black;font-size: 1.0em; font-family: garamond">Previous Answer</font></td>
              <td><font style="font-weight: bold;color:black;font-size: 1.0em; font-family: garamond">New Answer</font></td>
            </tr>
            <tr>
              <td><div class="box"><font style="color:black;font-size: 0.9em; font-family: garamond"><?php echo $row['Answer']; ?></font></div></td>
              <td><textarea class="new" name="Reply" placeholder="Enter New Answer"></textarea></td>
            </tr>
            <tr>
              <td align="right"><button class="button" name="NoChange">No Change</button></td>
              <td align="right"><button class="button" name="Update">Update</button></td>
            </tr>
         </table>
         <?php
      }
          ?>
    </div>
</form>
</body>
</html>

<?php
   if(isset($_POST['Update']))
   {
     if(empty($_POST['Reply']))
     {
      ?>
        <script type="text/javascript">
          window.alert('Enter The Answer');
        </script>
      <?php
     }
     else
     {
      $Rep = $_POST['Reply'];
      $query = "UPDATE query SET Answer='$Rep',Status='Solved' WHERE id='$id'";
      mysqli_query($db,$query);
      header('Location:viewall.php');
     }
   }
   if (isset($_POST['NoChange'])) 
   {  
   	 header('Location:viewall.php');
   }

   if(isset($_POST['Home']))
   {
    header('Location:viewall.php');
   }

   if(isset($_POST['Logout']))
   {
     session_destroy();
     header('Location:joinas.php');
   }

   if(isset($_POST['about']))
    {
        header('Location:About.php'); 
    }

    if(isset($_POST['faq']))
    {
        header('Location:Faq.php'); 
    }

    if(isset($_POST['contact']))
    {
        header('Location:Contact.php'); 
    }
?>


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
  function depart()
  {
    var a=prompt("Enter new Department");
    alert(a);
  }
</script>