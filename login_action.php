<?php
  include("include/config.php");
?>
<html>
  <head>
  </head>
  <body>
    <a href="login.php"><button type=button>Back</button></a>
    <?php
      // login values from login here
      $username = $_POST['userEmail'];
      $password = $_POST['userPwd'];
      $sql = "SELECT * FROM users WHERE user_email='$username' LIMIT 1";
      $result = mysqli_query($db, $sql);
      $temp = substr($username, strpos($username, '@') + 1);
      if(mysqli_num_rows($result) == 1 && strpos($temp, '.') == true) {
        // check password hash
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['pwdHash'])) {
          echo "Login success " . $username;
          $_SESSION["UID"] = $row["user_id"]; // the first record is set, bind to userid
          $_SESSION["userName"] = $row["user_name"];
          header("location:index.php");
        } else {
          echo '<script>alert("Incorrect password.")</script>';
        }
      } else {
        echo '<script>alert("Invalid username.")</script>';
      }
      mysqli_close($db);
    ?>
  </body>
</html>
