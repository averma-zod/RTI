<?php
     $db = mysqli_connect('localhost','root','','rti');
     $query = "SELECT * FROM view";
     $sql = mysqli_query($db,$query);
     $number = mysqli_num_rows($sql);

     echo $number;

     while($row = mysqli_fetch_array($sql))
     {
        $q = $row['Query'];
        $r = $row['Department'];
        echo $q;
        echo $r?><br><?php
     }
?>