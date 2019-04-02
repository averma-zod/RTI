<?php
session_start();
if($_SESSION['Username'] == '')
  {
    header('Location:joinas.php');
  }

  if(isset($_POST['Home']))
  {
    header('Location:add.php');
  }

  if(isset($_POST['Logout']))
  {
    session_destroy();
    header('Location:joinas.php');
  }

if(isset($_POST['AccSet']))
  {
    header('Location:Acount.php');
  }

if(isset($_POST['query']))
  {
    $_SESSION['filt'] = $_POST['query'];
    header('Location:userfilter.php');
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