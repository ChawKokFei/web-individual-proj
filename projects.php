<?php
  include("include/config.php");
  if(!isset($_SESSION["UID"])) {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Personal Site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Page content -->
    <main>
      <h2>My Software Projects</h2>
      <div class=scroll>
        <table border="1" id="projectable">
          <tr id="projectable tr">
            <th id="projectable th">ID</th>
            <th id="projectable th">Project Name</th>
            <th id="projectable th">Project Desciption</th>
            <th id="projectable th">Software Requirements</th>
            <th id="projectable th">Action</th>
          </tr>
          <?php
            $idCount = 1;
            $sql = "SELECT * FROM project, users WHERE project.user_id = users.user_id ORDER BY project.proj_id DESC LIMIT 1";
            $result = mysqli_query($db, $sql);
            if(mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $idCount = (int)$row['proj_id'];
            }
            $userID = (int)$_SESSION["UID"];
            $sql = "SELECT * FROM project, users WHERE project.user_id = users.user_id AND project.user_id = $userID";
            $result = mysqli_query($db, $sql);
            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                if(isset($_SESSION['setEditable']) && $_SESSION['setEditable'] == $row['proj_id']) {
          ?>
                  <form action="project_action.php?action=save&id=<?php echo $row['proj_id']; ?>" method="post">
                    <tr id="projectable tr" name="row_<?php echo $row['proj_id']; ?>">
                      <td id="projectable td"><?php echo $row['proj_id']; ?></td>
                      <td id="projectable td">
                        <input type=text name="proj_name" class="tableText" value="<?php echo htmlentities($row['proj_name']); ?>"></td>
                      <td id="projectable td">
                        <input type=text name="proj_desc" class="tableText" value="<?php echo htmlentities($row['proj_description']); ?>"></td>
                      <td id="projectable td">
                        <input type=text name="proj_req" class="tableText" value="<?php echo htmlentities($row['proj_req']); ?>"></td>
                      <td id="projectable td">
                        <button class="tableButton" type="submit" name="save">Save</button> &nbsp
                        <a href="projects.php">
                          <button class="tableButton" type="button" name="return">Return</button></a>
                      </td>
                    </tr>
                  </form>
                  <?php
                  unset($_SESSION['setEditable']);
                } else {
                  ?>
                  <tr id="projectable tr" name="row_<?php echo $row['proj_id']; ?>">
                    <!-- html entities (to display reserved character) -->
                    <td id="projectable td"><?php echo $row['proj_id']; ?></td>
                    <td id="projectable td"><?php echo htmlentities($row['proj_name']); ?></td>
                    <td id="projectable td"><?php echo htmlentities($row['proj_description']); ?></td>
                    <td id="projectable td"><?php echo htmlentities($row['proj_req']); ?></td>
                    <td id="projectable td">
                    <a href="project_action.php?action=edit&id=<?php echo $row['proj_id']; ?>">
                      <button class="tableButton" type="button" name="edit">Edit</button></a> &nbsp
                    <a href="project_action.php?action=delete&id=<?php echo $row['proj_id']; ?>">
                      <button class="tableButton" type="button" name="delete"
                        onclick="javascript: return confirm('Confirm delete?');">Delete</button></a>
                    </td>
                  </tr>
          <?php
                } // if editable
              } // fetch row
            } // row > 0
          ?>
          <form action="project_action.php?action=add&id=<?php echo $idCount + 1 ?>" method="post">
            <tr id="projectable_tr">
              <td id="projectable td" name="proj_id"><?php echo $idCount + 1 ?></td>
              <td id="projectable td">
                <input type=text name="proj_name" class="tableText"></td>
              <td id="projectable td">
                <input type=text name="proj_desc" class="tableText"></td>
              <td id="projectable td">
                <input type=text name="proj_req" class="tableText"></td>
              <td id="projectable td">
                <button class="tableButton" type="submit" name="add">Add</button></td>
            </tr>
          </form>
        </table>
      </div>
      <?php if(isset($_SESSION['message'])) { ?>
        <div class="msg">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
      <?php } ?>
    </main>
    <!-- Footer -->
    <footer>
      <br>
      <div class="footer">
        <small><i>Copyright &copy 2021 Chaw Kok Fei</i></small>
      </div>
    </footer>
  </body>
  <?php mysqli_close($db); ?>
</html>
