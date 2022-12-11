<?php
session_start();
//include("include/config.php");
if (!isset($_SESSION["UID"])) {
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
  <main>
    <h2>Software Review Form</h2>
    <p>Send us your review of our software. Required fields marked with an asterisk *</p>
    <form method="post" action="review_action.php">
      <p><label for="userName">*Name:</label>
        <input type="text" name="userName" id="userName" required="required" placeholder="Your first and last name">
      </p>
      <p><label for="userEmail">*E-mail:</label>
        <input type="email" name="userEmail" id="userEmail" required="required" placeholder="you@yourdomain.com">
      </p>
      <p><label for="userRating">Software Rating (1 - 10):</label>
        <input type="range" name="userRating" id="userRating" min="1" max="10" step="1" value="1">
      </p>
      <p><label for="userReview">*Review:</label>
        <textarea name="userReview" id="userReview" rows="2" cols="20" required="required"></textarea>
      </p>
      <p><label for="recommend">*Recommend to others? :</label>
        <input type="checkbox" name="recommend" id="recommend" value="yes">
      </p>
      <button type="submit" id="mySubmit">Submit</button>
    </form>
    <br>
  </main>
  <!-- Footer -->
  <footer>
    <div class="footer">
      <small><i>Copyright &copy; 2021 Chaw Kok Fei</i></small>
    </div>
  </footer>
</body>

</html>