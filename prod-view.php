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
            <div class="container">

                <!-- Product Card -->
                <div class="col-lg-12">
                  <div class="card">
                          <div class="card-header d-flex align-items-center">
                            <h3 class="h4"><? echo $row['name'] . ' - ' .  $p_id ; ?></h3>
                          </div><!-- card header -->
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
                          	<p><strong>RRP:</strong> £<?= $row['p_retail'] ?></p>
                          	<p style="padding:10px;"><?= $row['description'] ?></p>

                          </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div><!-- card body -->
                  </div><!-- card -->
                </div><!-- col-lg-12 -->
                <!-- Product Card -->

                <!-- Product Card -->
                <div class="col-lg-6">
                  <div class="card">
                          <div class="card-header d-flex align-items-center">
                            <h4 class="h4">Add To Job</h4>
                          </div><!-- card header -->
                    <div class="card-body">

                    <div class="col-sm-12 col-lg-12 p-3">

                        <form action="job-save.php" method="post">
                        <input type="hidden" name="p_id" value="<?= $p_id ?>">
                        <input type="hidden" name="p_retail" value="<?= $row['p_retail'] ?>">

                        <div class="form-group row">
                          <label for="qty_job" class="col-sm-2 col-form-label">Qty</label>
                          <div class="col-sm-6">
                            <input type="text"  class="form-control" name="qty_job">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_job" class="col-sm-2 col-form-label">Job #</label>
                            <div class="col-sm-10">
                                 <select class="custom-select" name="id_job">
                                  <option></option>
                                <? $sql_s = mysqli_query($link, "SELECT * FROM job");

                                while ($row = $sql_s->fetch_assoc()){  ?>
                                <option value="<?= $row['id'] ?>" ><?php echo $row['id']; ?> - <?php echo $row['vin']; ?></option>
                                <?
                                } ?>
                                </select>
                            </div><!-- class sm 10 -->
                        </div><!-- form group row -->

                        <button type="submit" class="btn btn-primary btn-block" name="addto_job">Add </button>

                    </div><!-- col-sm-12 col-lg-12 -->
                      
                    </div><!-- card body -->
                  </div><!-- card -->
                </div><!-- col-lg-6 -->
                <!-- Product Card -->

            </div><!-- container-fluid -->
        </section><!-- section -->

<?php

include 'footer.php';

?>