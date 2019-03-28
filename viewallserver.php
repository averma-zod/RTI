<?php
  session_start();

  if($_SESSION['Type'] == 'User')
  {
    header('Location:add.php');
  }
  
  if($_SESSION['Username'] == '')
  {
    header('Location:joinas.php');
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