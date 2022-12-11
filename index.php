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
    <!-- Navigation Menu -->
    <nav class="topnav">
      <?php
        include("include/topNav.php");
      ?>
    </nav>
    <!-- Page content -->
    <div class="row">
      <div class="col-left">
        <img src="img/avatar.jpg" alt="avatar image"
        style="width:200px; height:200px">
      </div>
      <div class="col-mid">
        <h1>About Me</h1>
        <p>A 2<sup>nd</sup> year Software Engineering student in
          Faculty of Computing and Informatics, UMS.</p>
        <p>This is My Personal Site.</p>
      </div>
      <div class="col-right">
        <div class="aside">
          <h2>What?</h2>
          <p>Web Engineering course covers client-side scripting and server side scripting </p>
          <h2>Where?</h2>
          <p>Makmal Computer, Block B, Level 4 FKJ</p>
          <h2>When?</h2>
          <p>Every Tuesday 8 - 10 am</p>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <div class="footer">
        <small><i>Copyright &copy; 2021 Chaw Kok Fei</i></small>
      </div>
    <footer>
  </body>
</html>
