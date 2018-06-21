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

}

?>