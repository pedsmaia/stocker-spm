<?
include 'link.php';

// check if new or edit
$state = $_POST['state'];

if ($state == 'edit')
	    {
					$cust_name = mysqli_real_escape_string($link, $_POST['cust-name']);
					$vehicle = mysqli_real_escape_string($link, $_POST['vehicle']);
					$vin = mysqli_real_escape_string($link, $_POST['vin']);
					$jobtype = mysqli_real_escape_string($link, $_POST['job-type']);

		$id_job = mysqli_real_escape_string($link, $_POST['j_id']);

	        	// update the DB with the values sent
	        	$sql = "UPDATE job 
				SET cust_name = '$cust_name', 
				vehicle = '$vehicle', 
				vin = '$vin', 
				jobtype = '$jobtype'
				WHERE id = '$id_job'";
				if(mysqli_query($link, $sql)){
				// redirect ack to product page
				header('Location: job-view.php?id='.$id_job);
				exit;

				} else {
					$error = $link->error;
					$result = 'ERROR: Could not create product: ' . $error;

	        	} // endof mysqli query INSERT
	    } // endof # EDIT PRODUCT #
	    else 
	    	if ($state == 'new') {

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
	    } // endof # NEW PRODUCT #

// if loop 1
if (isset($_POST['addto_job'])) {
$p_id = mysqli_real_escape_string($link, $_POST['p_id']);
$qty_job = mysqli_real_escape_string($link, $_POST['qty_job']);
$id_job = mysqli_real_escape_string($link, $_POST['id_job']);
$p_retail = mysqli_real_escape_string($link, $_POST['p_retail']);
$return = mysqli_real_escape_string($link, $_POST['return']);
$c_stock = mysqli_real_escape_string($link, $_POST['c_stock']);

// if loop 2
if ($c_stock >= $qty_job) {

		$sql = "INSERT INTO job_stock (job_id, p_id, qty, p_retail)
			VALUES 
			('$id_job', '$p_id', '$qty_job', '$p_retail')";

		// if loop 3
		if(mysqli_query($link, $sql)){

			//if the products were successfuly added to the job, let's take out of stock

			//variable with the stock minus what we just used
			$new_stock = $c_stock - $qty_job ;

			//update current stock in database
			$sql = "UPDATE product 
				SET c_stock = '$new_stock'
				WHERE id = '$p_id'";

				// if loop 4
				if(mysqli_query($link, $sql)){

					// if loop 5
					if ($return == 'job') {
					header('Location: job-view.php?id='.$id_job);
					} else {	// if loop 5
					header('Location: prod-view.php?id='.$p_id);
					exit;
					}	// if loop 5

				}	// if loop 4

		} else {	// if loop 3
			echo "Error adding product to job.";
		}	// if loop 3

} else {	// if loop 2
	echo "there's not enough stock!";
		}	// if loop 12


} // if loop 1

if ($prodreturn == 'yes') {
	# code...
}


?>	