<script type="text/javascript">
    window.alert("SUCCESS");
</script>

<!DOCTYPE html>
<html>
<head>
    <style>
        table,th,tr,td{
            border:1px solid #483D8B;
            border-collapse: collapse;
            padding:5px 100px 1px 10px;
        }
        button
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
        button:active 
        {
            box-shadow: 0 2px 0 #2F4F4F;
            transform: translateY(3px);
        }
    </style>
<h1 align="center" style="font-family: garamond; color: #2F4F4F ;margin-top:40px"><?php session_start();echo  $_SESSION['dep'];?> Queries</h1>

</head>
<body style="background-color: #E6E6FA">
    <?php
     $db = mysqli_connect('localhost','root','','rti');
     $query = "SELECT * FROM view";
     $sql = mysqli_query($db,$query);
    ?>
    <table align="center" style="margin-top: 20px">
        <thead>
            <th>Query</th>
            <th>Department</th>
            <th>Similarity %</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php
              while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
              {?><tr><?php
                $q = $row['Query'];
                $r = $row['Department'];
                $p = $row['Percentage'];
                $s = $row['Status'];
        
            ?>
                <td><?php echo $q; ?></td>
                <td><?php echo $r; ?></td>
                <td><?php echo $p; ?></td>
                <td><?php echo $s; ?></td></tr><?php
              }
              ?>
        </tbody>
    </table>
    <div align="center">
        <a href="Add.php"><button class="button">Another Query</button></a>
    </div>
</body>
</html>



