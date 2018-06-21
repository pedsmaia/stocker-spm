<?php
include 'link.php';

if(isset($_POST['get_option'])){

$id= $_POST['get_option'];
$sql = mysqli_query($link, "SELECT * FROM subcategories WHERE cat_id = '$id' ");
$result = mysqli_query($link,$sql);


if(!empty($sql)){

while ($row = $sql->fetch_assoc()){ 
echo '<option value="'.$row['id'].'">'.$row['subcategory'].'</option>';
}

}
}
?>