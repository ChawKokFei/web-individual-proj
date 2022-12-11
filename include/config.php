<?php
  //define constant
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'miniproject');

  session_start();
  $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  if(mysqli_connect_error()) {
    exit("Connection failed: " . mysqli_connect_error());
    // die == exit (same)
  }
?>
