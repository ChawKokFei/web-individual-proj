<a href="index.php">Home</a> &nbsp;
<a href="projects.php">My Software Projects</a> &nbsp;
<a href="review_form.php">Software Review Form</a> &nbsp;
<a href="contact.php">Contact Me</a>
<?php
  // login and logout session
  if(isset($_SESSION["UID"])) {
    echo '<a href="logout.php" style="text-align:right; float:right;">
      <i class="fa fa-sign-out" style="font-size:12px" align="right"></i> Logout </a>
      <label id="loginName" style="text-align:right; float:right;" ><b>' . $_SESSION["userName"] . '</b></label>';
  } else {
    echo '<a href="login.php" style="text-align:right; float:right;">
      <i class="fa fa-sign-in" style="font-size:12px" align="right"></i> Login </a>';
  }
?>
