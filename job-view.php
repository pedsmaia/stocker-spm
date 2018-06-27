<?php

$title = "Job Details";

include 'header.php';

	// Get Job ID
  $j_id = $_GET['id'];


  	// Get job info from database
  $sql = mysqli_query($link, "SELECT * FROM job WHERE id LIKE '$j_id'");
  $row = $sql->fetch_assoc();

?>

		<section class="forms">
            <div class="container-fluid">

                <!-- Job Card -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                      <span class="small mr-2">Date Opened: <?= $row['date_created'] ?></span>
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-ellipsis-v"></i> </button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a href="#"  data-toggle="modal" data-target="#editjobmodal" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit Job</a>
                          <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close Job</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">Order #<?= $j_id ; ?></h4>
                    </div>
                    <div class="card-body">

                    	<div class="row">
                    <div class="col-sm-12 col-lg-3 p-3">
                    	<p><strong>Lincolnshire Motorhomes and Caravans</strong><br>
                    	Lockham Gate, Wrangle<br>
                    	Boston, Lincolnshire<br>
                    	PE22 9DD</p>
                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-9 p-3">

                    	<div class="row"><div class="col-sm-4 text-right"><strong>Customer:</strong></div> <div class="col-sm-4"><?= $row['cust_name'] ?></div></div>
                    	<div class="row"><div class="col-sm-4 text-right"><strong>Vehicle:</strong></div> <div class="col-sm-4"> <?= $row['vehicle'] ?></div></div>
                    	<div class="row"><div class="col-sm-4 text-right"><strong>VIN:</strong></div> <div class="col-sm-4"> <?= $row['vin'] ?></div></div>
                      <div class="row"><div class="col-sm-4 text-right"><strong>Type Of Job:</strong></div> <div class="col-sm-4"> <?= $row['jobtype'] ?></div></div>

                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Job Card -->

                <!-- Product Card -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">Products Used</h4>
                    </div>
                    <div class="card-body">

                    	<div class="row equal">
                    <div class="col-sm-12 col-lg-11 p-3">

<table class="table small">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col" style="text-align: right;">Sum</th>
    </tr>
  </thead>
  <tbody>

    <?php
            $sql_s = mysqli_query($link, "SELECT * FROM job_stock WHERE job_id = '$j_id' ");
   			while ($row_s = $sql_s->fetch_assoc()) {
   				$p_id = $row_s['p_id'];
   				$qty = $row_s['qty'];
   				$p_retail = $row_s['p_retail'];
   				$total_price = $row_s['p_retail'] * $row_s['qty'];
   				$sum+= $total_price;

   			$sql_r = mysqli_query($link, "SELECT name FROM product WHERE id = '$p_id' ");
  			$row_r = $sql_r->fetch_assoc();
  	?>
<tr class="class<?php echo ($xyz++%2); ?>">
<td class="p_id"><?= $p_id ?></td><td> <?= $row_r['name'] ?> </td><td><?= $row_s['p_retail'] ?></td><td><?= $row_s['qty'] ?></td><td style="text-align: right;"><b><?= $total_price; ?></b></td></tr> <? } ?>

<tr><td> </td><td> </td><td> </td><td style="text-align: right;"><b><i>Discount:</i></b></td><td style="text-align: right;"><b> </b></td></tr>
<tr><td> </td><td> </td><td> </td><td style="text-align: right;"><b>Total:</b></td><td style="text-align: right;"><b>£ <?= $sum; ?></b></td></tr>
</tbody>
</table>

                    </div><!-- col-sm-12 col-lg-6 -->

                    <div class="col-sm-12 col-lg-1 p-3">
			<button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#exampleModal"> + Add </button>
      <button type="button" class="btn btn-sm btn-block btn-warning" data-toggle="modal" data-target="#prodreturnmodal"> Edit </button>


                    </div><!-- col-sm-12 col-lg-6 -->

                    	</div><!-- row -->
                      
                    </div>
                  </div>
                </div>
                <!-- Product Card -->



            </div><!-- container-fluid -->
        </section><!-- section -->

<script>
function showResult(str) {
  var jobid = '<?php echo $j_id; ?>';
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.marginTop = "10px";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+ str +"&jobid="+ jobid,true);
  xmlhttp.send();
}
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Find Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<div class="text-center">
				 <div class="form-group">
				 <input type="text" onkeyup="showResult(this.value)">
				 </div>
			</div>
			 	<div id="livesearch"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- EDIT JOB MODAL -->

<div class="modal fade" id="editjobmodal" tabindex="-1" role="dialog" aria-labelledby="editjobmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                    <form action="job-save.php" method="POST" class="form-horizontal add-product">
                    <!-- STATE (new or edit) -->
                    <input type="hidden" name="state" value="edit">
                    <!-- JOB ID (if editing) -->
                    <input type="hidden" name="j_id" value="<?= $j_id ?>">

                        <div class="form-group row">
                          <label for="cust-name" class="col-sm-3 form-control-label">Customer Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="cust-name" class="form-control" value="<?= $row['cust_name'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="vehicle" class="col-sm-3 form-control-label">Vehicle</label>
                          <div class="col-sm-9">
                            <input type="text" name="vehicle" class="form-control" value="<?= $row['vehicle'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="vin" class="col-sm-3 form-control-label">Vin #</label>
                          <div class="col-sm-9">
                            <input type="text" name="vin" class="form-control" value="<?= $row['vin'] ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="company" class="col-sm-3 form-control-label">Company</label>
                          <div class="col-sm-9">
                          <select class="custom-select" name="company">
                            <option value="lincsmac" <? if ($row['company'] == 'lincsmac') { echo 'selected'; }  ?> >LincsMaC</option>
                            <option value="eurocruiser" <? if ($row['company'] == 'eurocruiser') { echo 'selected'; }  ?> >EuroCruiser</option>
                            <option value="sttgroup" <? if ($row['company'] == 'sttgroup') { echo 'selected'; }  ?> >The STT Group</option>

                            <? /* $sql = mysqli_query($link, "SELECT * FROM locations");
                            while ($row = $sql->fetch_assoc()){  ?>
                            <option value="<?= $row['location'] ?>" <? if ($row['location'] == $p_loc) { echo 'selected';} ?> ><?php echo $row['location']; ?></option>
                            <?
                            } */ ?>

                          </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="job-type" class="col-sm-3 form-control-label">Job Type</label>
                          <div class="col-sm-9">
                          <select class="custom-select" name="job-type">
                            <option value="build" <? if ($row['jobtype'] == 'build') { echo 'selected'; }  ?> >Build</option>
                            <option value="service" <? if ($row['jobtype'] == 'service') { echo 'selected'; }  ?> >Service</option>
                            <option value="repair" <? if ($row['jobtype'] == 'repair') { echo 'selected'; }  ?> >Repair</option>
                            <option value="conversion" <? if ($row['jobtype'] == 'conversion') { echo 'selected'; }  ?> >Conversion</option>
                            <option value="warranty" <? if ($row['jobtype'] == 'warranty') { echo 'selected'; }  ?> >Warranty</option>

                            <? /* $sql = mysqli_query($link, "SELECT * FROM locations");
                            while ($row = $sql->fetch_assoc()){  ?>
                            <option value="<?= $row['location'] ?>" <? if ($row['location'] == $p_loc) { echo 'selected';} ?> ><?php echo $row['location']; ?></option>
                            <?
                            } */ ?>

                          </select>
                          </div>
                        </div>

                <button type="submit" class="btn btn-primary btn-block">Update Job</button>
              </form>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- EDIT JOB MODAL -->

<!-- PRODUCT RETURN MODAL -->

<div class="modal fade" id="prodreturnmodal" tabindex="-1" role="dialog" aria-labelledby="prodreturnmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product Quantities</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?
          $sql_ms = mysqli_query($link, "SELECT * FROM job_stock WHERE job_id = '$j_id' ");
          while ($row_ms = $sql_ms->fetch_assoc()) {
          $p_id = $row_ms['p_id'];
          $job_qty = $row_ms['qty'];
          $row_id = $row_ms['id'];
        ?>

                    <form action="job-save.php" method="POST" class="form-horizontal add-product">
                    <!-- STATE (new or edit) -->
                    <input type="hidden" name="prodreturn" value="yes">
                    <!-- JOB ID (if editing) -->
                    <input type="hidden" name="j_id" value="<?= $j_id ?>">
                    <!-- JOB ID (if editing) -->
                    <input type="hidden" name="job_qty" value="<?= $job_qty ?>">
                    <!-- JOB ID (if editing) -->
                    <input type="hidden" name="p_id" value="<?= $p_id ?>">
                    <!-- JOB ID (if editing) -->
                    <input type="hidden" name="row_id" value="<?= $row_id ?>">
          <div class="form-group row">
            <label for="qty" class="col-sm-2 form-control-label"><?= $p_id ?></label>
              <div class="col-sm-2">
              <input type="text" name="qty" class="form-control" value="<?= $job_qty ?>">
              </div>
              <div class="col-sm-1">
                    <button class="btn btn-sm btn-primary" type="submit" name="submit">Add </button>
              </div>
            </div>
        </form>

        <?
          }

        ?>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- PRODUCT RETURN MODAL -->

<?php

include 'footer.php';

?>