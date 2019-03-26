</script>
<?php
	session_start();
	$db = mysqli_connect('localhost','root','','rti');
?>
<html>
<head>
	<title>Similar</title>
	<style type="text/css">
		 table,th,tr,td{
            border:1px solid #483D8B;
            border-collapse: collapse;
            padding:5px 100px 1px 10px;
        }
		.head{
			margin-top: 12px;
		}
		.btn{
			margin-top: 12px;
		}
		.btnn
        {
            background: #778899;
            border-radius: 4px;
            box-shadow: 2px 5px 2px #2F4F4F;
            color: white;
            padding: 10px 24px;
            margin: 10px 0 0 0;
            outline: 0;
            border: 0;
            transition: all .1s linear;
        }
        .btnn:active 
        {
            box-shadow: 0 2px 0 #2F4F4F;
            transform: translateY(3px);
        }
	</style>
</head>
<body style="background-color: #E6E6FA">
 <form method="POST" action="similar.php">
	    <div align="center">
	    	<font style="font-size: 1.4em;font-family: garamond;font-weight: bold;">Your Query:</font>
	    		<font style="font-size: 1.4em;font-family: garamond;font-weight: bold;color:slateblue"><?php echo $_SESSION['qu'];?></font><br>
	    <font style="font-size: 1.5em; font-family: garamond">The Similar Queries are:</font>
	    </div>
	    <?php  
	    $query = "SELECT * FROM Query";
        $sql = mysqli_query($db,$query);
        ?>
        <table align="center" style="margin-top: 20px">
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
	                	?><button name="Add" value="<?=$id?>">Show Answer</button><?php
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