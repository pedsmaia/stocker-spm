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

  $p_location =  $row['p_location'];
  $p_cat = $row['p_cat'];

?>

		<section class="forms">
            <div class="container">

                <!-- Product Card -->
                <div class="col-lg-12">
                  <div class="card">
                          <div class="card-header d-flex align-items-center">
                            <h3 class="h4"><? echo $row['name'] . ' - ' .  $p_id ; ?></h3>
                          </div><!-- card header -->
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-ellipsis-v"></i> </button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a href="#"  data-toggle="modal" data-target="#editproductmodal" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit Product</a>
                        </div>
                      </div>
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
                        <input type="hidden" name="c_stock" value="<?= $row['c_stock'] ?>">

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
                      </form>

                    </div><!-- col-sm-12 col-lg-12 -->
                      
                    </div><!-- card body -->
                  </div><!-- card -->
                </div><!-- col-lg-6 -->
                <!-- Product Card -->

            </div><!-- container-fluid -->
        </section><!-- section -->


<!-- EDIT PRODUCT MODAL -->

<div class="modal fade" id="editproductmodal" tabindex="-1" role="dialog" aria-labelledby="editproductmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                    <form action="prod-save.php" method="POST" class="form-horizontal add-product">
                    <!-- STATE (new or edit) -->
                    <input type="hidden" name="state" value="edit">
                    <!-- JOB ID (if editing) -->
                    <input type="hidden" name="prod-code" value="<?= $p_id ?>">

                        <div class="form-group row">
                          <label for="name" class="col-sm-3 form-control-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="description" class="col-sm-3 form-control-label">Description</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="3"><?= $row['description'] ?></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="location" class="col-sm-3 form-control-label">Location</label>
                          <div class="col-sm-9">
                          <select class="custom-select" name="location">
                            <option>Select location</option>

                            <? $sql_loc = mysqli_query($link, "SELECT * FROM locations");
                            while ($row_loc = $sql_loc->fetch_assoc()){  ?>
                            <option value="<?= $row_loc['location'] ?>" <? if ($row_loc['location'] == $p_location) { echo 'selected';} ?> ><?php echo $row_loc['location']; ?></option>
                            <?
                            } ?>

                          </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="sublocation" class="col-sm-3 form-control-label">Sub Location</label>
                          <div class="col-sm-9">
                            <input type="text" name="sublocation" class="form-control" value="<?= $row['location'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="newstock" class="col-sm-3 form-control-label">New Stock</label>
                          <div class="col-sm-9">
                            <input type="text" name="newstock" class="form-control" value="<?= $row['c_stock'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="usedstock" class="col-sm-3 form-control-label">Used Stock</label>
                          <div class="col-sm-9">
                            <input type="text" name="usedstock" class="form-control" value="<?= $row['u_stock'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="lowstock" class="col-sm-3 form-control-label">Low Stock Alert</label>
                          <div class="col-sm-9">
                            <input type="text" name="lowstock" class="form-control" value="<?= $row['q_alert'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="category" class="col-sm-3 form-control-label">Category</label>
                          <div class="col-sm-9">
                      <select class="custom-select" onchange="fetch_select(this.value);" name="category">
                      <? $sql_cat = mysqli_query($link, "SELECT * FROM categories");
                      while ($row_cat = $sql_cat->fetch_assoc()){  ?>
                      <option value="<?= $row_cat['id'] ?>" <? if ($row_cat['id'] == $row['p_cat']) { echo 'selected';} ?> ><?php echo $row_cat['category']; ?></option>
                      <?
                      } ?>
                      </select>
                        </div>
                      </div>

                        <div class="form-group row">
                          <label for="subcategory" class="col-sm-3 form-control-label">Sub Category</label>
                          <div class="col-sm-9">

                      <select class="custom-select" id="new_select" name="subcategory">
                      <? if(!empty($p_id)) {
                         $sql_subcat = mysqli_query($link, "SELECT * FROM subcategories WHERE cat_id LIKE '$p_cat' ");
                               while ($row_subcat = $sql_subcat->fetch_assoc()){  ?>
                               <option value="<?= $row_subcat['id'] ?>" <? if ($row_subcat['id'] == $row['p_subcat']) { echo 'selected';} ?> ><?php echo $row_subcat['subcategory']; ?></option>
                               <? }  // while loop
                      } else { ?>
                      <? } // if !empty
                      ?> </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="supplier" class="col-sm-3 form-control-label">Supplier</label>
                          <div class="col-sm-9">
                            <input type="text" name="supplier" class="form-control" value="<?= $row['p_supplier'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="unit-type" class="col-sm-3 form-control-label">Unit Type</label>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="unit-type" id="inlineRadio1" value="piece" <? if ($row['unit'] == 'piece') { echo 'checked'; }  ?>>
                              <label class="form-check-label" for="inlineRadio1">piece</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="unit-type" id="inlineRadio2" value="metre" <? if ($row['unit'] == 'metre') { echo 'checked'; }  ?>>
                              <label class="form-check-label" for="inlineRadio2">metre</label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="cost" class="col-sm-3 form-control-label">Cost</label>
                          <div class="col-sm-9">

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">£</span></div>
                            <input type="text" name="cost" class="form-control" value="<?= $row['p_cost'] ?>">
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="retail" class="col-sm-3 form-control-label">Retail</label>
                          <div class="col-sm-9">

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">£</span></div>
                            <input type="text" name="retail" class="form-control" value="<?= $row['p_retail'] ?>">
                              </div>
                            </div>

                          </div>
                        </div>

                <button type="submit" class="btn btn-primary btn-block">Update Product</button>
              </form>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- EDIT PRODUCT MODAL -->

<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}
</script>

<?php

include 'footer.php';

?>