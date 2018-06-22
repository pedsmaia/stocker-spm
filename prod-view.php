<?php

$title = "Product Details";

include 'header.php';

	// Get Product ID
  $p_id = $_GET['id'];

  	// Get product photo's filename
  $sql = mysqli_query($link, "SELECT filename FROM photos WHERE prod_id LIKE '$p_id'");
  if(mysqli_num_rows($sql) > 0) {
  $row = $sql->fetch_assoc();
  $filename = 'uploads/' . $row['filename'];
} else {
  $filename = 'img/no-image.jpg';
}

  	// Get product info from database
  $sql = mysqli_query($link, "SELECT * FROM product WHERE id LIKE '$p_id'");
  $row = $sql->fetch_assoc();

?>

		<section class="forms">
            <div class="container-fluid">

                <!-- Product Card -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"><? echo $row['name'] . ' - ' .  $p_id ; ?></h3>
                    </div>
                    <div class="card-body">

                    	<div class="row">
                    <div class="col-sm-12 col-lg-3">
                    	<img class="img-thumbnail" src="<?= $filename ?>">
                    	<p class="text-center"><small><a href="prod-addphoto.php?id=<?= $p_id ?>">Change Product Photo</a></small></p>
                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-9 p-3">

                    	<p><strong>Location:</strong> <?= $row['p_location'] ?> - <?= $row['location'] ?></p>
                    	<p><strong>Unit:</strong> <?= $row['unit'] ?></p>
                    	<p><strong>Current Stock:</strong> <?= $row['c_stock'] ?> <? if (!empty($row["u_stock"])) { echo '<i><small> & <a href="#" data-toggle="modal" data-target=".used_stock">' . $row['u_stock'] . ' used</small></i></a></p>'; } ?></p>
                    	<p><strong>RRP:</strong> £<?= $p_retail ?></p>
                    	<p style="padding:10px;"><?= $row['description'] ?></p>

                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Product Card -->
            </div><!-- container-fluid -->
        </div><!-- section -->

<?php

include 'footer.php';

?>