<?php

$title = "Create New Job";

// initialize state variable for new or edit product
$state = 'new';

include 'header.php';

?>


          	<section class="forms">
            <div class="container-fluid">

                    <form action="job-save.php" method="POST" class="form-horizontal add-product">
                    <!-- STATE (new or edit) -->
                    <input type="hidden" name="state" value="<?= $state ?>">
                    <!-- PRODUCT ID (if editing) -->
                    <input type="hidden" name="j_id" value="<?= $j_id ?>">

                <!-- Product Card -->
                <div class="col-lg-6 mx-auto">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Job Details</h3>
                    </div>
                    <div class="card-body text-right">

                    	<div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                          <label for="cust-name" class="col-sm-3 form-control-label">Customer Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="cust-name" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="vehicle" class="col-sm-3 form-control-label">Vehicle</label>
                          <div class="col-sm-9">
                            <input type="text" name="vehicle" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="vin" class="col-sm-3 form-control-label">Vin #</label>
                          <div class="col-sm-9">
                            <input type="text" name="vin" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="job-type" class="col-sm-3 form-control-label">Job Type</label>
                          <div class="col-sm-9">
                          <select class="custom-select" name="job-type">
                            <option value="build">Build</option>
                            <option value="service">Service</option>
                            <option value="repair">Repair</option>
                            <option value="conversion">Conversion</option>
                            <option value="warranty">Warranty</option>

                            <? /* $sql = mysqli_query($link, "SELECT * FROM locations");
                            while ($row = $sql->fetch_assoc()){  ?>
                            <option value="<?= $row['location'] ?>" <? if ($row['location'] == $p_loc) { echo 'selected';} ?> ><?php echo $row['location']; ?></option>
                            <?
                            } */ ?>

                          </select>
                          </div>
                        </div>

                    </div><!-- col-sm-12 -->

                    	</div><!-- row -->

                <button type="submit" class="btn btn-primary btn-block">Create Job</button>
                      
                    </div>
                  </div>
                </div>
                <!-- Product Card -->

                    </form><!-- form-horizontal add-product -->

            </div><!-- container-fluid -->
        	</section>


<?php

include 'footer.php';

?>