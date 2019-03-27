<!DOCTYPE html>
<html>
<head>
	<title>viewall</title>
	<style>
        table,th,tr,td{
            border:1px solid #483D8B;
            border-collapse: collapse;
            padding:5px 100px 1px 10px;
        }
        .fl{
            border:none;
        }
    </style><div style=" width: all;background-color: black; height: 150px; border-radius: 10px ;background-image: linear-gradient(to right,black)">

            

                <img align="middle" style=" box-shadow: 4px 2px 2px lightgrey; border-radius: 50%; margin-left:0%; width: 150px;height: 150px" src="RTI.png">
                <font  style=" font-size:4.5em; font-family: garamond; color:white">RTI</font>
                <font style="color: white;font-size: 3.4em; margin-left: 24%; font-family: garamond">List of all Queries</font>

                
        </div>
</head>


<body style="background-color: white">
	<?php
     session_start();
     $db = mysqli_connect('localhost','root','','rti');
     $type = $_SESSION['Type'];
     $name = $_SESSION['Username'];
	 if($type == 'Admin')
     {
        $query = "SELECT * FROM Query";
        $sql = mysqli_query($db,$query);
     }
     else
     {
        $query = "SELECT * FROM Query WHERE Name='$name'";
        $sql = mysqli_query($db,$query);
     }
    ?><div style="width: 100%">
    <div style="float: left; width: 200px;height: 400px;margin-top: 10px; background-color: lightgrey">
        <b><font style=" font-size: 1.5em ; font-family: garamond;">Filter By:</font></b><br>


        <form method="POST" action="filter.php">
            <ul>
                <li>
                    <font style=" font-size: 1.3em ; font-family: garamond;">Date</font>
                    <ul>
                        <li><button class="fl" id="2019">2019</button></li>
                        <li><button class="fl" id="2018">2018</button></li>
                        <li><button class="fl" id="2017">2017</button></li>
                    </ul>
                </a></li>


                <li><button class="fl">Status</button></li>
                <li><button class="fl">Department</button></li>
            </ul>
        </form>

    <form method="POST" action="Reply.php">
    </div>

    <table align="left" style=" margin-left: 10px; margin-top: 10px">
        <thead>
            <th>Query</th>
            <th>Department</th>
            <th>Date</th>
            <th>Status</th>
            <th>Answer</th>
            <?php
               if($type == 'Admin')
               {
               	 ?><th>Reply</th><?php
               }
            ?>
        </thead>
        <tbody>
            <?php
              while($row = mysqli_fetch_array($sql,MYSQL_ASSOC))
              {
              	?>
              	<tr>
              	  <?php
                    $Query = $row['Query'];
                    $Department = $row['Department'];
                    $Date = $row['Date'];
                    $Status = $row['Status'];
                    $Answer = $row['Answer'];
                    $id = $row['id'];
                  ?>
        
                  <td><?php echo $Query; ?></td>
                  <td><?php echo $Department; ?></td>
                  <td><?php echo $Date; ?></td>
                  <td><?php echo $Status;?></td>
                  <td><?php echo $Answer; ?></td>
                  <td ><?php
                    if($type == 'Admin')
                    {
                 	   if($Status == 'Unsolved')
                 	   {
                 		 ?><button onclick="unsolve()" value="<?=$id ?>" name="Usolve">Reply</button><?php
                 	   }
                 	   elseif ($Status == 'Solved') 
                 	   {
                 		 ?><button onclick="solve()" value="<?=$id ?>" name="Solve">Change</button><?php
                 	   }
                    }
                  ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
    </form>
</body>
</html>
<script type="text/javascript">
    function unsolve(){
<?php
   if(isset($_POST['Usolve']))
   {
   	 $_SESSION['id']=$_POST['Usolve'];
   }?>
}
function solve(){
    <?php
   if(isset($_POST['Solve']))
   {
   	 $_SESSION['id']=$_POST['Solve'];
   }?>
}
</script>