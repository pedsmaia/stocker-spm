<?
include 'link.php';

// check if new or edit
$state = $_POST['state'];

// if name is passed, assign all variables  ####      START      ####
if (!empty($_POST["name"])) {
$name = mysqli_real_escape_string($link, $_POST['name']);
$description = mysqli_real_escape_string($link, $_POST['description']);
$s_tags = mysqli_real_escape_string($link, $_POST['tags']);
$location = mysqli_real_escape_string($link, $_POST['location']);
$sublocation = mysqli_real_escape_string($link, $_POST['sublocation']);
$unit = mysqli_real_escape_string($link, $_POST['unit-type']);
$supplier = mysqli_real_escape_string($link, $_POST['supplier']);
$cost = mysqli_real_escape_string($link, $_POST['cost']);
$retail = mysqli_real_escape_string($link, $_POST['retail']);
$category = mysqli_real_escape_string($link, $_POST['category']);
$subcategory = mysqli_real_escape_string($link, $_POST['subcategory']);
$c_stock = mysqli_real_escape_string($link, $_POST['newstock']);
$u_stock = mysqli_real_escape_string($link, $_POST['usedstock']);
$qtyalert = mysqli_real_escape_string($link, $_POST['lowstock']);
$p_id = mysqli_real_escape_string($link, $_POST['prod-code']);

		// if creating a new product  ####      NEW PRODUCT    ####
		if ($state == 'new') {
			$sql = "INSERT INTO product (name, description, s_tags, p_location, location, unit, q_alert, p_supplier, p_cost, p_retail, p_cat, p_subcat, c_stock, u_stock)
					VALUES 
					('$name', '$description', '$s_tags', '$location', '$sublocation', '$unit', '$qtyalert', '$supplier', '$cost', '$retail', '$category', '$subcategory', '$c_stock', '$u_stock')";
        	if(mysqli_query($link, $sql)){
        		// retrieve ID from the record we've just created
				$last_i_id = $link->insert_id;
				$last_id = sprintf("%06d", $last_i_id);
				// redirect to photo uploader
				header('Location: prod-addphoto.php?id='.$last_id);
				exit;

			} else {
				$error = $link->error;
				$result = 'ERROR: Could not create product: ' . $error;

        	} // endof mysqli query INSERT

        } else if ($state == 'edit') {
        	
        	// update the DB with the values sent
	        	$sql = "UPDATE product 
				SET name = '$name', 
				description = '$description', 
				s_tags = '$s_tags', 
				p_location = '$location',
				location = '$sublocation', 
				unit = '$unit', 
				q_alert = '$qtyalert',
				p_supplier = '$supplier', 
				p_cost = '$cost', 
				p_retail = '$retail',
				p_cat = '$category', 
				p_subcat = '$subcategory', 
				c_stock = '$c_stock',
				u_stock = '$u_stock'
				WHERE id = '$p_id'";
				if(mysqli_query($link, $sql)){
				// redirect ack to product page
				header('Location: prod-view.php?id='.$p_id);
				exit;
			}

        }   // endof #### NEW PRODUCT ####

} // if !empty POSTname

?>