<?php
  session_start();
	if(!empty($_SESSION["user_id"])) {
		header('location: index.php');
	}
  include 'link.php'; 
  if(empty($_SESSION["user_id"])) {

	$message="";
	if(!empty($_POST["login"])) {
		$result = mysqli_query($link,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) {
		$_SESSION["user_id"] = $row['username'];
		header('location: index.php');
		} else {
		$message = "Invalid Username or Password!";
		}
	}
	if(!empty($_POST["logout"])) {
		$_SESSION["user_id"] = "";
		session_destroy();
	}

 ?>

        <form action="" method="post" name="login">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Enter your username" name="username" required autofocus>
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
          </div>
          <button class="btn btn-lg btn-primary btn-block" name="login" value="Login"  type="submit">Sign in</button>
        </form>
      </div>
    </div>

    

<? } ?>