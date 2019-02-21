<?php
	session_start();

			$db = mysqli_connect('localhost','root','','rti');
			$Query=$_SESSION['qu'];
			$Department=$_SESSION['dep'];
			$Date=date('y/m/d');
			$query = "INSERT INTO Query(Query,Department,Date,Status) values('$Query','$Department','$Date','Unsolved')";
		            $q = mysqli_query($db,$query);

		            $query = "CREATE OR REPLACE VIEW view AS SELECT Query,Department,Percentage,Status FROM Query WHERE Department='$Department'";
		            $q = mysqli_query($db,$query);
					 header('Location:Submit.php');
?>	