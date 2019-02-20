
                <script type="text/javascript">
                    window.alert("SUCCESS");
                </script>
<?php
     $db = mysqli_connect('localhost','root','','rti');
     $query = "SELECT * FROM view";
     $sql = mysqli_query($db,$query);

     while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
     {
        $q = $row['Query'];
        $r = $row['Department'];
        echo $q;
        echo $r?><br><?php
     }
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <a href="Add.php"><button>Another Query</button></a>
</body>
</html>