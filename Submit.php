<!DOCTYPE html>
<html>
<head>
    <style>
        
    </style>
</head>
<body>
    <?php 
       session_start();
       $lp = $_SESSION['lastpage']; 
       if($lp == 'Similar')
       {
       	 echo $_SESSION['did'];
       }
       if($lp == 'Add' )
       {
         ?>Your Query Has Been Submitted We Will Respond To You As Soon As Possible<?php
       }
       if($lp == 'anyway' )
       {
         ?>Your Query Has Been Submitted We Will Respond To You As Soon As Possible<?php
       }
    ?>

    <a href="Add.php"><button class="button">Another Query</button></a>
</body>
</html>