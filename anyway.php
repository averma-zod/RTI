<?php
	session_start();

	$db = mysqli_connect('localhost','root','','rti');
	$Name = $_SESSION['Username'];
	$Query=$_SESSION['qu'];
	$Department=$_SESSION['dep'];
	$Date=date('y/m/d');
	$query = "INSERT INTO Query(Name,Query,Department,Date,Status) values('$Name','$Query','$Department','$Date','Unsolved')";
	$q = mysqli_query($db,$query);

	$query = "CREATE OR REPLACE VIEW view AS SELECT Query,Department,Percentage,Status FROM Query WHERE Department='$Department'";
	$q = mysqli_query($db,$query);
	$_SESSION['lastpage']='anyway';
	header('Location:Submit.php');
?>	