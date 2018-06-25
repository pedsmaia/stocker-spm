<?php

$title = "Job Details";

include 'header.php';

	// Get Job ID
  $j_id = $_GET['id'];


  	// Get job info from database
  $sql = mysqli_query($link, "SELECT * FROM job WHERE id LIKE '$j_id'");
  $row = $sql->fetch_assoc();

?>