<?php
  session_start();
  //include("include/config.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to lokalFood</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <!-- load font and icon library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="header">
        <img class="image" src="img/books.jpg" alt="books">
        <h1>Welcome to My Personal Site</h1>
      </div>
    </header>
    <!-- navigation menu -->
    <nav class="topnav">
      <?php
        include("include/topNav.php");
      ?>
    </nav>
    <!-- Page content row -->
    <div class="row">
      <div class="col-secLeft">
        <div class="header">
          <h4>| Login</h4>
        </div>
        <form action="login_action.php" method="post">
          <p><label for="userEmail">Username:</label>
            <input type="email" name="userEmail" id="userEmail" required="required"
            placeholder="Enter your email here"></p>
          <p><label for userPwd>Password</label>
            <input type="password" name="userPwd" id="userPwd" required="required"
            placeholder="Enter your password here"></p>
          <button type="submit" name="submit" id="loginSubmit">Login</button>
        </form>
      </div>

      <div class="col-secRight">
        <div class="header">
          <h4>| Registration</h4>
        </div>
        <form action="register_action.php" method="post">
          <p><label for="newUserName">Name:</label>
            <input type="text" name="userName" id="newUserName" required="required"
            placeholder="Enter name here"></p>
          <p><label for="newUserEmail">Email:</label>
            <input type="email" name="userEmail" id="newUserEmail" required="required"
            placeholder="Enter email here"></p>
          <p><label for="newUserPwd">Password:</label>
            <input type="password" name="userPwd" id="newUserPwd" required="required"
            placeholder="Enter password here"></p>
          <button type="submit" name="submit" id="regSubmit">Register</button> &nbsp;
          <input type="reset" name="reset" id="reset" value="Reset">
        </form>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <div class="footer">
        <small><i>Copyright &copy; 2021 Chaw Kok Fei</i></small>
      </div>
    <footer>
    <!-- end of page content -->
  </body>
</html>
