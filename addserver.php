<?php
  session_start();
  $db = mysqli_connect('localhost','root','','rti');

  if(isset($_POST['Submit']))
  {
  	 $Query = $_POST['text'];
  	 $Department = $_POST['Department'];
  	 if(empty($Query))
  	 {
  	 	echo "Enter Query";
  	 }
  	 else
  	 {
  	 	if($Department === 'Select')
  	 	{
  	 		echo "Select Department";
  	 	}
  	 	else
  	 	{
  	 		$Date = date('y/m/d');
            $query = "INSERT INTO Query(Query,Department,Date,Status) values('$Query','$Department','$Date','Unsolved')";
            $q = mysqli_query($db,$query);

            $query = "CREATE OR REPLACE VIEW view AS SELECT Query,Department FROM Query WHERE Department='$Department'";
            $q = mysqli_query($db,$query);

            $_SESSION['Dept'] = $Department;
            header('Location:Submit.php');
  	 	}
  	 }
  }
?>