<?php

$title = "Create New Product";

// initialize state variable for new or edit product
$state = 'new';

include 'header.php';

?>

          	<section class="forms">
            <div class="container-fluid">

                    <form action="prod-save.php" method="POST" class="form-horizontal add-product">
                    <!-- STATE (new or edit) -->
                    <input type="hidden" name="state" value="<?= $state ?>">
                    <!-- PRODUCT ID (if editing) -->
                    <input type="hidden" name="p_id" value="<?= $p_id ?>">

                <!-- Product Card -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Product Details</h3>
                    </div>
                    <div class="card-body text-center">

                    	<div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 form-control-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="description" class="col-sm-3 form-control-label">Description</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="3"></textarea>
                          </div>
                        </div>
                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group row">
                          <label for="tags" class="col-sm-3 form-control-label">Tags</label>
                          <div class="col-sm-9">
                            <input type="text" name="tags" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="prod-code" class="col-sm-3 form-control-label">Product Code</label>
                          <div class="col-sm-9">
                            <input type="text" name="prod-code" class="form-control" readonly placeholder="Will be generated on save.">
                          </div>
                        </div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Product Card -->

                <!-- Other Details Card -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Other Details</h3>
                    </div>
                    <div class="card-body text-center">

                    	<div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group row">
                          <label for="location" class="col-sm-3 form-control-label">Location</label>
                          <div class="col-sm-9">
                          <select class="custom-select" name="location">
                            <option>Select location</option>

                            <? $sql = mysqli_query($link, "SELECT * FROM locations");
                            while ($row = $sql->fetch_assoc()){  ?>
                            <option value="<?= $row['location'] ?>" <? if ($row['location'] == $p_loc) { echo 'selected';} ?> ><?php echo $row['location']; ?></option>
                            <?
                            } ?>

                          </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="sublocation" class="col-sm-3 form-control-label">Sub Location</label>
                          <div class="col-sm-9">
                            <input type="text" name="sublocation" class="form-control">
                          </div>
                        </div>
                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group row">
                          <label for="newstock" class="col-sm-3 form-control-label">New Stock</label>
                          <div class="col-sm-9">
                            <input type="text" name="newstock" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="usedstock" class="col-sm-3 form-control-label">Used Stock</label>
                          <div class="col-sm-9">
                            <input type="text" name="usedstock" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="lowstock" class="col-sm-3 form-control-label">Low Stock Alert</label>
                          <div class="col-sm-9">
                            <input type="text" name="lowstock" class="form-control">
                          </div>
                        </div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->

                        <div class="line"></div>

                      <div class="row">
                    <div class="col-sm-12 col-lg-6">

                        <div class="form-group row">
                          <label for="category" class="col-sm-3 form-control-label">Category</label>
                          <div class="col-sm-9">
                      <select class="custom-select" onchange="fetch_select(this.value);" name="category">
                        <option>Select category</option>
                      <? $sql = mysqli_query($link, "SELECT * FROM categories");

                      while ($row = $sql->fetch_assoc()){  ?>
                      <option value="<?= $row['id'] ?>" <? if ($row['id'] == $p_cat) { echo 'selected';} ?> ><?php echo $row['category']; ?></option>
                      <?
                      } ?>
                      </select>
                        </div>
                      </div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-6">

                        <div class="form-group row">
                          <label for="subcategory" class="col-sm-3 form-control-label">Sub Category</label>
                          <div class="col-sm-9">

                      <select class="custom-select" id="new_select" name="subcategory">
                        <option>Select subcategory</option>
                      <? if(!empty($p_id)) {
                         $sql = mysqli_query($link, "SELECT * FROM subcategories WHERE cat_id LIKE '$p_cat' ");
                               while ($row = $sql->fetch_assoc()){  ?>
                               <option value="<?= $row['id'] ?>" <? if ($row['id'] == $p_subcat) { echo 'selected';} ?> ><?php echo $row['subcategory']; ?></option>
                               <? }  // while loop
                      } else { ?>
                      <? } // if !empty
                      ?> </select>
                          </div>
                        </div>


                    </div><!-- col-sm-12 col-lg-6 -->

                      </div><!-- row -->

                        <div class="line"></div>

                      <div class="row">
                    <div class="col-sm-12 col-lg-6">

                        <div class="form-group row">
                          <label for="supplier" class="col-sm-3 form-control-label">Supplier</label>
                          <div class="col-sm-9">
                            <input type="text" name="supplier" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="unit-type" class="col-sm-3 form-control-label">Unit Type</label>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="unit-type" id="inlineRadio1" value="piece">
                              <label class="form-check-label" for="inlineRadio1">piece</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="unit-type" id="inlineRadio2" value="metre">
                              <label class="form-check-label" for="inlineRadio2">metre</label>
                            </div>
                          </div>
                        </div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-6">

                        <div class="form-group row">
                          <label for="cost" class="col-sm-3 form-control-label">Cost</label>
                          <div class="col-sm-9">

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">£</span></div>
                            <input type="text" name="cost" class="form-control">
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
                            <input type="text" name="retail" class="form-control">
                              </div>
                            </div>

                          </div>
                        </div>


                    </div><!-- col-sm-12 col-lg-6 -->

                      </div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Other Details Card -->

                <button type="submit" class="btn btn-primary btn-block">Create Product</button>

                    </form><!-- form-horizontal add-product -->

            </div><!-- container-fluid -->
        	</section>


<!-- dinamic fetch of sub-categories after category selected -->
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