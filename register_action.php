<?php
  include("include/config.php");
?>
<html>
  <head>
  </head>
  <body>
    <p><a href="login.php"><button type=button>Back</button></a></p>
    <?php
      $errorCount = 0;
      function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      function validateInput($data, $fieldName) {
        global $errorCount;
        $temp = "";
        if(empty($data)) {
          echo "Please enter your name.";
          ++$errorCount;
        } else {
          $temp = sanitizeInput($data);
        }
        if($fieldName == "Email") {
          $temp = substr($data, strpos($data, '@') + 1);
          if(strpos($temp, '.') == false) {
            ++$errorCount;
            echo '<script>alert("Incomplete email address.")</script>';
          } else {
            $temp = sanitizeInput($data);
          }
        }
        return $temp;
      }

      $userName = validateInput($_POST['userName'], "Name");
      $userEmail = validateInput($_POST['userEmail'], "Email");
      $userPwd = validateInput($_POST['userPwd'], "Password");

      if($errorCount == 0) {
        // check if customer already exists
        $sql = "SELECT * FROM users WHERE user_email='$userEmail' LIMIT 1";
        $userExists = $db->query($sql);
        if($userExists->num_rows == 1) {
          echo '<script>alert("Error: User exists, cannot register")</script>';
        } else {
          // customer not exists, insert new record, hash the password
          $pwdHash = trim(password_hash($userPwd, PASSWORD_DEFAULT));
          $sql = "INSERT INTO users(user_name, user_email, user_pwd, pwdHash, user_year, fal_id)
            VALUES('$userName', '$userEmail', '$userPwd', '$pwdHash', 2, 1)";
          if(mysqli_query($db, $sql)) {
            echo '<script>alert("New customer record created successfully")</script>';
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
          }
        }
      }
      $db->close();
    ?>
  </body>
</html>
