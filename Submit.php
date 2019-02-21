<script type="text/javascript">
    window.alert("SUCCESS");
</script>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
     $db = mysqli_connect('localhost','root','','rti');
     $query = "SELECT * FROM view";
     $sql = mysqli_query($db,$query);
    ?>
    <table>
        <thead>
            <th>Query</th>
            <th>Department</th>
            <th>Percentage</th>
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
    
    <a href="Add.php"><button>Another Query</button></a>
</body>
</html>



