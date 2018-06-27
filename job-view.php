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
                      <span class="small">Date Opened: <?= $row['date_created'] ?></span>
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

                    	<div class="row">
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
			<button type="button" class="btn btn-sm btn-block btn-danger" data-toggle="modal" data-target="#exampleModal"> x Close </button>


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

<?php

include 'footer.php';

?>