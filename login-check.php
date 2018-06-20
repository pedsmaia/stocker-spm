<?

	session_start();

      if(!isset($_SESSION["user_id"])){
	  // $_SESSION['after_login'] = $_SERVER['REQUEST_URI'];
      header("Location: login.php");
      exit(); }


?>