</script>
<?php
	session_start();
	$db = mysqli_connect('localhost','root','','rti');
?>
<html>
<head>
	<title>Similar</title>
	<link rel="stylesheet" type="text/css" href="SimilarStyle.css">
</head>
<body style="background-color: #E6E6FA">
 <form method="POST" action="similar.php">
 	    <header>
		  <img align="top" style=" border-radius: 50%; margin-left:5px;margin-top:5px; width: 70px;height: 70px" src="RTI.png">
		  <font  style=" font-size:4.5em; margin-left: 10px; font-family: garamond; color:white">RTI</font>
		  <div class="right-nav"><button class="navbtn">About</button><button class="navbtn">FAQ</button><button class="navbtn">Contact</button></div>	  
        </header>

        <div class="navigation">
    	<select class="navibtn" name="Filter">
    	  <option hidden="">Queries</option>
    	  <option value="Medical">Medical</option>
    	  <option value="Education">Education</option>
    	  <option value="Traffic">Traffic</option>
    	</select><br>
    	<button class="navibtn">Account Settings</button><br>
    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	<button class="logbtn" name="Logout">Logout</button>
       </div>

       <div class="data" align="center">
	    	<font style="font-size: 1.4em;font-family: garamond;font-weight: bold;">Your Query:</font>
	    	<font style="font-size: 1.4em;font-family: garamond;font-weight: bold;color:slateblue"><?php echo $_SESSION['qu'];?></font><br>
	        <font style="font-size: 1.5em; font-family: garamond">The Similar Queries are:</font>
	    
	    <?php  
	    $query = "SELECT * FROM Query";
        $sql = mysqli_query($db,$query);
        ?>
        <table align="center" style="margin-top: 40px">
        <thead>
            <th>Query</th>
            <th>Department</th>
            <th>Similarity %</th>
            <th>Date</th>
            <th>Answer</th>
            <th>Add</th>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
        {
     	    if($row['Percentage']>70 && $row['Department']==$_SESSION['dep'])
     	    {
     	    	?><tr><?php
     	    	$id = $row['id'];
	            $q = $row['Query'];
	            $r = $row['Department'];
	            $p = $row['Percentage'];
	            $d = $row['Date'];
	            $ans = $row['Answer'];
	            $status = $row['Status'];


	            $xx=explode(" ", $q);
	            $xy=explode(" ", $_SESSION['qu']);
	            $c=sizeof($xx);
	            $l=sizeof($xy);

	            
	            for ($c=0; $c <sizeof($xy) ; $c++)
	            { 
	            	for ($l=0; $l <sizeof($xx) ; $l++)
	            	{	
	            		similar_text($xx[$l],$xy[$c],$per);
	            		if($per>90)
	            		{
	            			$high="<span style='font-weight:bold ;background-color:	lightskyblue;'>$xx[$l]</span>";
	            			$q=str_ireplace($xx[$l], $high, $q);
	            		}
	            	}
	            }

	           	
	            ?>
	            <td><?php echo $q;?></td>
	            <td><?php echo $r;?></td>
	            <td><?php echo $p;?></td>
	            <td><?php echo $d;?></td>
	            <td><?php echo $ans;?></td>

	            <td><?php 
	                if($status == 'Solved')
	                {
	                	?><button class="show" name="Add" value="<?=$id?>">Show Answer</button><?php
	                }
	                else
	                {
	                	echo 'No Answer';
	                }
	            ?>
	            </td>
	            </tr><?php
	        }
	    }
        ?>
    </div>
    </tbody>
</table>
        <div class="btn" align="center">
        	<font style="font-family: garamond;font-size: 1.2em">Add Anyway?</font><br>
         <button name="Yes" class="btnn">YES</button>
	     <button name="No" class="btnn">NO</button>
	    </div>
	</div>
 </form>
</body>
</html>


<?php
    if(isset($_POST['Add']))
    { 
    	
        
        $a = $_POST['Add'];
    	$sql = "SELECT * FROM Query WHERE id='$a'";    
        $result = mysqli_query($db,$sql);
        $roow = $result->fetch_assoc();
    	$anss = $roow['Answer'];
    	
    	$_SESSION['lastpage'] = 'Similar';
    	$_SESSION['did'] = $anss;
    	header('Location:Submit.php');
    }

   
    else if(isset($_POST['Yes']))
    {
    	header('Location:anyway.php');
    }    

    else if(isset($_POST['No']))
    {
    	header('Location:Add.php');
    }
?>