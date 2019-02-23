<script type="text/javascript">
    window.alert("SIMILAR QUERY ALREADY EXISTS IN SAME DEPARTMENT");
</script>
<?php
	session_start();
	$db = mysqli_connect('localhost','root','','rti');
?>
<html>
<head>
	<title>Similar</title>
	<style type="text/css">
		.table{
			border: 1px solid black;
			margin-top: 5%;
			width: 40%;
			height: 30%;
			margin-left: 28%;
		}
		.head{
			margin-top: 12px;
		}
		.mid{
			margin-top: 12px;
		}
		.btn{
			margin-top: 12px;
		}
	</style>
</head>
<body>
	<div align="center" class="table">
	    <div class="head">
	    <font style="font-size: 22;">The Similar Query is:</font>
	    </div>
	    <?php  
	    $query = "SELECT * FROM Query";
        $sql = mysqli_query($db,$query);
        ?>
        <div class="mid">
        <?php
        while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
        {
     	    if($row['Percentage']>70 && $row['Department']==$_SESSION['dep'])
     	    {
	            $q = $row['Query'];
	            $r = $row['Department'];
	            ?><font style="font-size: 22;"><strong>Query: </strong><?php echo $q;
	            ?><br><strong>Department: </strong><?php echo $r;?></font><?php
	        }
        }
        ?>
        </div>
        <div class="btn">
        	<font>Add Anyway</font><br>
         <a href="anyway.php"><button>YES</button></a>
	     <a href="Add.php"><button>NO</button></a>
	    </div>
	</div>
</body>
</html>