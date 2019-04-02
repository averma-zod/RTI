<?php
session_start();
$d=$_SESSION['filt'];
if(isset($_POST['query']))
  {
    $_SESSION['filt'] = $_POST['query'];
    header('Location:filter.php');
  }

  
  if(isset($_POST['AccSet']))
  {
    header('Location:Acount.php');
  }


    if(isset($_POST['Usolve']))
  {
  	session_start();
  	$_SESSION['ii']=$_POST['Usolve'];
  	header('Location:Reply.php');
  }
  if(isset($_POST['Solve']))
  {
  	session_start();
  	$_SESSION['ii']=$_POST['Solve'];
  	header('Location:Reply.php');
  }

   if(isset($_POST['Home']))
   {
    header('Location:viewall.php');
   }

  if($_SESSION['Type'] == 'User')
  {
    header('Location:add.php');
  }
  

 if($d=='All Queries')
   {
   	header("Location:viewall.php");
   }
?>