<?   include 'link.php';
$job_id=$_GET['jobid'];

if(isset($_GET["q"])) {
$q=$_GET["q"];
$result_s = $link->query("SELECT * FROM product WHERE id LIKE '%".$q."%' ");
   while ($row_s = $result_s->fetch_assoc()) { ?>
      <div class="container text-center">
        <form action="job-save.php" class="smalltxt" method="post">
        <input type="hidden" name="return" value="job">
        <input type="hidden" name="id_job" value="<?= $job_id; ?>">
        <input type="hidden" name="p_id" value="<?= $row_s['id'] ?>">
        <input type="hidden" name="p_retail" value="<?= $row_s['p_retail'] ?>">
        <input type="hidden" name="c_stock" value="<?= $row_s['c_stock'] ?>">
  <div class="form-group row">
   <div class="col-sm-2">
      <? echo '<small>' . $row_s['id'] . '</small>' ; ?>
   </div>
   <div class="col-sm-4 text-right">
      <? echo '<small>' . $row_s['name'] . '</small>' ; ?>
   </div>
   <div class="col-sm-2">
    <? echo '<small>' . $row_s['c_stock'] . ' in stock.</small>'; ?>
   </div>
   <div class="col-sm-1">
    <label for="qty_job" class="col-sm-1 col-form-label">Qty</label>
   </div>
   <div class="col-sm-2">
      <input type="text" class="form-control-sm form-control" name="qty_job">
   </div>
   <div class="col-sm-1">
        <button class="btn btn-sm btn-primary" type="submit" name="addto_job">Add </button>
  </div>
  </div>
        </form>
      </div><!-- text center -->
<?
 }
} ?>