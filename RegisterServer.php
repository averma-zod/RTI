<?php
  $db = mysqli_connect("localhost","root","","rti");

  if(isset($_POST['Submit']))
  {
  	$name = $_POST['Name'];
  	$email = $_POST['Email'];
  	$gender = $_POST['Gender'];
  	$password = $_POST['Password'];
    $cpassword = $_POST['CPassword'];

    if($password != $cpassword)
    {
      ?>
        <script type="text/javascript">
          window.alert('Password Does Not Match');
        </script>
      <?php
    }
    else
    {
      if($name == 'Admin')
      {
        echo "Admin Already Exists";
      }
      else
      {
        $sql = "SELECT * FROM admin WHERE Name='$name'";    
        $result = mysqli_query($db,$sql);
        $number=$result->num_rows;

        if($number == 0)
        {
          $password = md5($password);
          $sql = "INSERT INTO admin(Name,Email,Gender,Password) VALUES ('$name','$email','$gender','$password')";
          mysqli_query($db,$sql);
          ?>
            <script type="text/javascript">
              window.alert('Success');
            </script>
          <?php
          
          header('Location:login.php');
        }
        elseif ($number > 0) 
        {
          ?>
          <script type="text/javascript">
            window.alert('User Already Exists');
          </script>
          <?php
        }
      }
    }
  }
?>
