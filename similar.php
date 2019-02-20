
            	<script type="text/javascript">
            		window.alert("SIMILAR QUERY ALREADY EXISTS IN SAME DEPARTMENT");
            	</script>
            	
<?php

	session_start();
	$db = mysqli_connect('localhost','root','','rti');
	echo "The Similar Query is:";
	?><br><?php
	$query = "SELECT * FROM Query";
     $sql = mysqli_query($db,$query);

     while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
     {
     	if($row['Percentage']>70 && $row['Department']==$_SESSION['dep'])
     	{
	        $q = $row['Query'];
	        $r = $row['Department'];
	        echo $q;
	        echo $r?><br><?php
	    }
     }

?>
<html>
<head>
	Add anyway?
</head>
<body>
	<a href="anyway.php"><button>YES</button></a>
	<a href="Add.php"><button>NO</button></a>
</body>
</html>