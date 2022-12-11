<?php
  include("include/config.php");
  $errorCount = 0;

  function sanitizeInput($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function validateInput($data, $fieldName) {
    global $errorCount;
    if(empty($data) || trim($data) == "") {
      ++$errorCount;
    } else {
      $data = sanitizeInput($data);
    }
    return $data;
  }

  if(!empty($_GET['action'])) {
    switch($_GET['action']) {
      case "add":
        $proj_id = (int)$_GET["id"];
        $proj_name = validateInput($_POST["proj_name"], "Name");
        $proj_desc = validateInput($_POST["proj_desc"], "Desc");
        $proj_req = validateInput($_POST["proj_req"], "Req");
        $user_id = (int)$_SESSION["UID"];
        if($errorCount > 0) {
          $_SESSION['message'] = "Please make sure all fields are filled in";
          header("location: projects.php");
        } else {
          $sql = "INSERT INTO project VALUES($proj_id, '$proj_name', '$proj_desc', '$proj_req', $user_id)";
          if(mysqli_query($db, $sql)) {
            $_SESSION['message'] = "Project Added";
          } else {
            $_SESSION['message'] = "Error adding: " . mysqli_error($db);
          }
          header("location: projects.php");
        }
        break;
      case "delete":
        $proj_id = (int)$_GET['id'];
        $sql = "DELETE FROM project WHERE proj_id = $proj_id";
        if(mysqli_query($db, $sql)) {
          $_SESSION['message'] = "Project Deleted";
        } else {
          $_SESSION['message'] = "Error deleting: " . mysqli_error($db);
        }
        unset($_SESSION['delete']);
        header("location: projects.php");
        break;
      case "edit":
        $_SESSION['setEditable'] = (int)$_GET['id'];
        header("location: projects.php");
        break;
      case "save":
        $proj_id = (int)$_GET["id"];
        $proj_name = $_POST["proj_name"];
        $proj_desc = $_POST["proj_desc"];
        $proj_req = $_POST["proj_req"];
        $user_id = (int)$_SESSION["UID"];
        echo $proj_name;
        $sql = "UPDATE project
          SET `proj_name` = '$proj_name',
              `proj_description` = '$proj_desc',
              `proj_req` = '$proj_req'
          WHERE `user_id` = $user_id AND `proj_id` = $proj_id";
        if(mysqli_query($db, $sql)) {
          $_SESSION['message'] = "Project Edited";
        } else {
          $_SESSION['message'] = "Error editing: " . mysqli_error($db);
        }
        header("location: projects.php");
        break;
    } // switch
  } // !empty action
  mysqli_close($db);
?>
