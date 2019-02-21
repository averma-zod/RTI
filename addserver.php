<?php
  session_start();
  $db = mysqli_connect('localhost','root','','rti');

  if(isset($_POST['Submit']))
  {
  	 $Query = $_POST['text'];
  	 $Department = $_POST['Department'];
  	 if(empty($Query))
  	 {
  	 	   ?><script>
          window.alert("Enter Query");
        </script><?php
  	 }
  	 else
  	 {
  	 	if($Department === 'Select')
  	 	{
  	 		?><script>
          window.alert("Select Department");
        </script><?php
  	 	}
  	 	else
  	 	{

  	 		$Date = date('y/m/d');

  	 		$query = "CREATE OR REPLACE VIEW view AS SELECT Query,Department,Percentage,Status FROM Query WHERE Department='$Department'";
        $q = mysqli_query($db,$query);

        $query = "SELECT * FROM view";
		    $sql = mysqli_query($db,$query);

		    $high=0;
		    while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
		    {
		      $q = $row['Query'];
		      similar_text($Query, $q,$percent);

		      $query = "UPDATE Query SET Percentage=$percent WHERE Query='$q'";
	        $x = mysqli_query($db,$query);

		      if($percent>$high)
				  {
					  $high=$percent;
					  $_SESSION['highest']=$q;
		      }
		    }
		    if($high<70)
		    {
	        $query = "INSERT INTO Query(Query,Department,Date,Status) values('$Query','$Department','$Date','Unsolved')";
	        $q = mysqli_query($db,$query);

	        $query = "CREATE OR REPLACE VIEW view AS SELECT Query,Department,Percentage,Status FROM Query WHERE Department='$Department'";
	            $q = mysqli_query($db,$query);
				

	            $_SESSION['Dept'] = $Department;
	            header('Location:Submit.php');
	            
          }
          else
          {
            	$_SESSION['dep']=$Department;
            	$_SESSION['qu']=$Query;
	            header('Location:similar.php');
          }
  	 	}
  	 }
  }
?>