<?php
  session_start();
  //include("include/config.php");
  if(!isset($_SESSION["UID"])) {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Personal Site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <!-- load font and icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  </head>
  <body>
    <!-- header -->
    <header>
      <div class="header">
        <img class="image" src="img/books.jpg" alt="books">
        <h1>Welcome to My Personal Site</h1>
      </div>
    </header>
    <!-- Navigation Menu -->
    <nav class="topnav">
      <?php
        include("include/topNav.php");
      ?>
    </nav>
    <main>
      <h2>Contact Me</h2>
      <li>
        <ul>Email: <a href="mailto:bi19110132@student.ums.edu.my">bi19110132@student.ums.edu.my</a></ul>
        <ul>Phone: 017-676 0148</ul>
      </li>
    </main>
    <footer>
      <div class="footer">
        <small><i>Copyright &copy; 2021 Chaw Kok Fei</i></small>
      </div>
    </footer>
  </body>
</html>
