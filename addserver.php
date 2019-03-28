<?php
  session_start();
  $Name = $_SESSION['Username'];
  $db = mysqli_connect('localhost','root','','rti');

  if($_SESSION['Type'] == 'Admin')
  {
    header('Location:viewall.php');
  }

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
  	 	if($Department == 'Select')
  	 	{
  	 		?><script>
          window.alert("Select Department");
        </script>
        <?php
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
	        $query = "INSERT INTO Query(Name,Query,Department,Date,Status) values('$Name','$Query','$Department','$Date','Unsolved')";
	        $q = mysqli_query($db,$query);

	        $query = "CREATE OR REPLACE VIEW view AS SELECT Query,Department,Percentage,Statusz FROM Query WHERE Department='$Department'";
	            $q = mysqli_query($db,$query);
				
              $_SESSION['Query'] = $Query; 
	            $_SESSION['Dept'] = $Department;
              $_SESSION['lastpage'] = 'Add';
              header('Location:Submit.php');  
          }
          else
          {
              $_SESSION['Q'] = $Query; 
            	$_SESSION['dep']=$Department;
            	$_SESSION['qu']=$Query;
	            header('Location:similar.php');
          }
  	 	}
  	 }
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