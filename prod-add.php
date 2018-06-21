<?php

$title = "Create New Product";

include 'header.php';

?>

          	<section>
            <div class="container-fluid">

                    <form class="form-horizontal add-product">

                <!-- Product Card -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
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
                        <div class="line"></div>

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
                        <div class="line"></div>

                        <div class="form-group row">
                          <label for="prod-code" class="col-sm-3 form-control-label">Product Code</label>
                          <div class="col-sm-9">
                            <input type="text" name="prod-code" class="form-control" readonly placeholder="Will be generated on save.">
                          </div>
                        </div>
                        <div class="line"></div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Product Card -->

                <!-- Location Card -->
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
                            <input type="text" name="location" class="form-control">
                          </div>
                        </div>
                        <div class="line"></div>

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
                        <div class="line"></div>

                        <div class="form-group row">
                          <label for="usedstock" class="col-sm-3 form-control-label">Used Stock</label>
                          <div class="col-sm-9">
                            <input type="text" name="used-stock" class="form-control">
                          </div>
                        </div>
                        <div class="line"></div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Location Card -->

                    </form><!-- form-horizontal add-product -->

            </div><!-- container-fluid -->
        	</section>

<?php

include 'footer.php';

?>