<!DOCTYPE html>
<html>
<head>
    <title>Submitted</title>
    <link rel="stylesheet" type="text/css" href="SubmitStyle.css">
</head>
<body>
  <form method="POST" action=Submit.php>
  <header>
    <div class="left-nav"><font size="6">RTI</font></div><div class="right-nav"><button class="navbtn">About</button><button class="navbtn">FAQ</button><button class="navbtn">Contact</button></div>     
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
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <button class="logbtn" name="Logout">Logout</button>
    </div>
    <div class="data">
    <?php 
       session_start();
       $lp = $_SESSION['lastpage']; 
       if($lp == 'Similar')
       {
       	 echo $_SESSION['did'];
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
    <a href="Add.php"><button class="button">Another Query</button></a>
    </div>
</body>
</html>

<?php

  if(isset($_POST['home']))
  {
    header('Location:add.php');
  }
?>