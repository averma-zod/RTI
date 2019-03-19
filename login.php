<?php include('loginserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <form method="POST" action="login.php">
    <table>
      <tbody>
        <tr>
          <td>Username</td><td><input type="text" name="Name" placeholder="Enter Username"></td>
        </tr>
        <tr>
          <td>Password</td><td><input type="Password" name="Password" placeholder="Enter Password"></td>
        </tr>
         <tr>
          <td colspan="2"><input type="Submit" name="Submit" Value="Login"></td>
        </tr>
      </tbody>
    </table>
  </form>
</body>
</html>