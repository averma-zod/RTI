<!DOCTYPE html>
<html>
<head>
    <title>Submitted</title>
    <link rel="stylesheet" type="text/css" href="SubmitStyle.css">
</head>
<body>
  <form method="POST" action=Submit.php>
    <header>
    <img align="top" style=" border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
    <font  style=" font-size:4.5em; margin-left: 10px; font-family: garamond; color:white">RTI</font>
    <div class="right-nav"><button class="navbtn">About</button><button class="navbtn">FAQ</button><button class="navbtn">Contact</button></div>    
    </header>

    <div class="navigation">
      <button name="home" class="navibtn">Home</button><br>
      <select class="navibtn" name="Filter">
        <option hidden="">Queries</option>
        <option value="Medical">Medical</option>
        <option value="Education">Education</option>
        <option value="Traffic">Traffic</option>
      </select><br>
      <button class="navibtn">Account Settings</button><br>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <button class="logbtn" name="Logout">Logout</button>
    </div>
    <div class="data" align="center">
    <?php 
       session_start();
       $lp = $_SESSION['lastpage']; 
       if($lp == 'Similar')
       {
       	 ?><table>
             <tr height="80px">
                <td width="300px;"><font size="5" color="Black" face="Times New Roman">Your Query:</font></td><td><font size="5"><?php echo $_SESSION['Q'];?></font></td>
             </tr>
             <tr>
                <td><font size="5" color="Black" face="Times New Roman">Answer: </font></td><td><font size="5"><?php echo $_SESSION['did'];?></font></td>
             </tr>
            </table>
          <?php
       }
       if($lp == 'Add' )
       {
         ?>Your Query <strong><?php echo $_SESSION['Query'] ?></strong> Has Been Submitted We Will Respond To You As Soon As Possible<?php
       }
       if($lp == 'anyway' )
       {
         ?>Your Query Has Been Submitted We Will Respond To You As Soon As Possible<?php
       }
    ?>
     <br><br><br><br><a href="Add.php"><button class="button">Another Query</button></a>
    </div>
</body>
</html>

<?php

  if(isset($_POST['home']))
  {
    header('Location:add.php');
  }
?>