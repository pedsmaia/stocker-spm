<?
include 'link.php';

// check if new or edit
$state = $_POST['state'];

// if name is passed, assign all variables  ####      START      ####
if (!empty($_POST["cust-name"])) {
$cust_name = mysqli_real_escape_string($link, $_POST['cust-name']);
$vehicle = mysqli_real_escape_string($link, $_POST['vehicle']);
$vin = mysqli_real_escape_string($link, $_POST['vin']);
$jobtype = mysqli_real_escape_string($link, $_POST['job-type']);

		// if creating a new job  ####      NEW JOB    ####
		if ($state == 'new') {
			$sql = "INSERT INTO job (cust_name, vehicle, vin, jobtype)
					VALUES 
					('$cust_name', '$vehicle', '$vin', '$jobtype')";
        	if(mysqli_query($link, $sql)){
				// redirect to photo uploader
				header('Location: job-view.php?id=');
				exit;

			} else {
				$error = $link->error;
				$result = 'ERROR: Could not create job: ' . $error;

        	} // endof mysqli query INSERT

        } // endof #### NEW JOB ####

} // if !empty POSTname

?>