<?php
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

?>