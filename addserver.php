<?php
	$db=mysqli_connect("localhost","root","","Query") or die("error");

	if(isset($_POST['submit']))
	{
		$text=$_POST['text'];
		$department=$_POST['select'];
		$date=date("D/M/Y");
		$query="INSERT INTO record(Department,Query,Date) VALUES('$department','$text','$date')";
		$xx=mysqli_query($db,$query);
	}
?>