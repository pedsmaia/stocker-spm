<?php

$title = "Add Photo";

include 'header.php';

$prod_id = $_GET['id'];

?>

		<section>
            <div class="container-fluid">

                <!-- Upload Photo Form-->
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Add A Product Photo</h3>
                    </div>
                    <div class="card-body text-center">

	                      <p> New product has been successfuly created.<br>
	                      	<strong>Product ID: <?= $prod_id; ?></strong></p>

	                      <p>Use the upload form below o add a product photo or click <strong>Skip this step</strong> to continue without one. </p>

						
						<form enctype="multipart/form-data" action="uploader.php" method="POST">
						<input type="hidden" name="prod_id" value="<?= $prod_id; ?>" />
						<p>Upload or take photo:</p>
						<div class="alert alert-info">
						<input name="uploadedfile" type="file" />
						</div><!-- alert info uploader -->
						<input type="submit" value="Upload File" />
						</form>

					<p class="mt-3"><a href="#">Skip this step.</a></p>

                    </div>
                  </div>
                </div>

            </div><!-- container-fluid -->
        </section>

<?php

include 'footer.php';

?>