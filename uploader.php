<?php

$title = "Product Photo Uploader";

include 'header.php';

if (!empty($_POST["prod_id"])) {

$prod_id = $_POST["prod_id"];

$target_path = "uploads/";
    $filename = $prod_id . basename( $_FILES['uploadedfile']['name']);

$target_path = $target_path . $filename; 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    $sql = "INSERT INTO photos (filename,prod_id) 
    VALUES 
            ('$filename', '$prod_id')";
if(mysqli_query($link, $sql)){
    $result = 'to product ' . $prod_id;
} else{
    $result = 'ERROR: Could not associate photo: ' . mysqli_error($link);
} // if query

    $up_result = "The photo has been uploaded ";
} else{
    $up_result = "There was an error uploading the file, please try again!";
} 
} else {
    $result = "prod_id was empty";
}

?>

<section>
        <div class="col-sm-12 text-center">
            <p><?php echo $up_result . $result; ?></p>    
            <img  class="img-thumbnail m-2" src="uploads/<?= $filename ?>">
            <p><a class="btn btn-primary" href="prod-view.php?id=<?= $prod_id ?>" role="button">View Product</a></p>
        </div>
</section>

<?php

include 'footer.php';

?>