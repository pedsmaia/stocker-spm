<?php

// DATABASE CONNECTION DETAILS
$link = mysqli_connect("localhost","lincsmac_stocker","flym4zt3r","lincsmac_stocker");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else { echo "Connected";}
?>