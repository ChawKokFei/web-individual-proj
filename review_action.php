Welcome <?php echo $_POST['userName']; ?><br>
Your email address : <?php echo $_POST['userEmail']; ?><br>
Your rating : <?php echo $_POST['userRating']; ?><br>
Your review : <?php echo $_POST['userReview']; ?><br>
Your recommendation : <?php
    if($checkBoxValue = isset($_POST['recommend'])){
      echo "Yes";
    } else {
      echo "No";
    }
  ?><br>

<?php
  include("include/config.php");
?>
<html>
  <head>
  </head>
  <body>
    <a href="review_form.php"><button type=button>Back</button></a>
    <?php
      $errorCount = 0;

      //each input will call validateInput function
      $userName = validateInput($_POST['userName'], "Name");
      $userEmail = validateInput($_POST['userEmail'], "Email");
      $userReview = validateInput($_POST['userReview'], "Review");

      if($errorCount > 0) {
        echo "Please use the \"Back\" button to re-enter the data.<br />\n";
      } else {
        $recommend = "";
        if($checkBoxValue = isset($_POST['recommend'])){
          $recommend = "Yes";
        } else {
          $recommend = "No";
        }
        $userRating = (int)$_POST['userRating'];
        $userID = (int)$_SESSION['UID'];
        $sql = "INSERT INTO review(review_name, review_email, review_rating, review_text, review_recommend, user_id)
          VALUES('$userName', '$userEmail', $userRating, '$userReview', '$recommend', $userID)";
        if(mysqli_query($db, $sql)) {
          header("location: index.php");
        } else {
          echo "Error reviewing: " . mysqli_error($db) . "<br />";
        }
      }

      function validateInput($data, $fieldName) {
        global $errorCount;
        if(empty($data)) {
          displayRequired($fieldName); // call displayRequired function
          ++$errorCount;
          $retval = "";
        } else { // call sniatize_input function if the input isn't empty
          $retval = sanitize_input($data);
        }
        if($fieldName == "Email") {
          $temp = substr($data, strpos($data, '@') + 1);
          if(strpos($temp, '.') == false) {
            echo "Incomplete email address.<br />\n";
            ++$errorCount;
            $retval = "";
          } else {
            $retval = sanitize_input($data);
          }
        }

        return($retval);
      }

      function displayRequired($fieldName) {
        echo "The field \"$fieldName\" is required.<br />\n";
        // <br /> indicates self-closing tag or null tag
        // <br> is equivalent to <br /> however is latter is preferred (for XHTML must use this or <br></br>)
        // <br/> line break in XHTML, <br /> for XHTML documents to render on existing HTML user agents (web browser)
        // \n not displayed in browser (php server side), only in the source code of that page
        // if \n not exist, then the source code won't insert newline
      }

      function sanitize_input($data) { //sanitize_input function
        $data = trim($data); //remove whitespaces from both sides
        $data = stripslashes($data); //remove backslahes
        $data = htmlspecialchars($data); //convert special HTML entities back to characters
        return $data;
      }
      mysqli_close($db);
    ?>
  </body>
</html>
