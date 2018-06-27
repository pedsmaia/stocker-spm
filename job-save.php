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
			$sql = "INSERT INTO job (cust_name, vehicle, vin, jobtype, date_created)
					VALUES 
					('$cust_name', '$vehicle', '$vin', '$jobtype', NOW())";
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

if (isset($_POST['addto_job'])) {
$p_id = mysqli_real_escape_string($link, $_POST['p_id']);
$qty_job = mysqli_real_escape_string($link, $_POST['qty_job']);
$id_job = mysqli_real_escape_string($link, $_POST['id_job']);
$p_retail = mysqli_real_escape_string($link, $_POST['p_retail']);
$return = mysqli_real_escape_string($link, $_POST['return']);

		$sql = "INSERT INTO job_stock (job_id, p_id, qty, p_retail)
			VALUES 
			('$id_job', '$p_id', '$qty_job', '$p_retail')";
		if(mysqli_query($link, $sql)){
			if ($return == 'job') {
			header('Location: job-view.php?id='.$id_job);
			} else {
			header('Location: prod-view.php?id='.$p_id);
			exit;
			}

		} else {
			echo "Error adding product to job.";
		}


	}


?>	