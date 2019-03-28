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
  <form method="POST" action="Reply.php">
  <header>
    <img align="top" style=" border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
    <font  style=" font-size:4.5em; margin-left: 10px; font-family: garamond; color:white">RTI</font>
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
    <div style="height: 68%;"></div>
    <button class="logbtn" name="Logout">Logout</button>
  </div>

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