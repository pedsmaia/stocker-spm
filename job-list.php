<?php

$title = "List Jobs";

include 'header.php';

?>

<section>

<?php

$sql2 = mysqli_query($link, "SELECT * FROM job");
$result = mysqli_query($link,$sql2);
if(!empty($sql2)){
?>

<div class="container-fluid">
<table class="table table-sm small">
  <thead class="thead-dark">
    <tr>
      <th class="p_id">Job #</th>
      <th>Customer</th>
      <th>Vehicle</th>
      <th>VIN</th>
      <th>Company</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
<tbody>

<?
while ($row = $sql2->fetch_assoc()){ ?>
<tr class="class<?php echo ($xyz++%2); ?>">
<td class="p_id"><?php echo $row['id']; ?> </td><td><a href="job-view.php?id=<?= $row['id'] ?>"><?php echo $row['cust_name']; ?></a> </td><td> <?php echo $row['vehicle'] ?></td><td> <?php echo $row['vin']; ?></td><td> <?php echo $row['company']; ?></td>
<td class="icons"><a href="job-view.php?id=<?= $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> <i class="fa fa-trash-o" aria-hidden="true"></i></td></tr>
<?
} 
?>

</tbody>
</table>
</div><!-- container -->

<?
}
?>

</section>

<?php

include 'footer.php';

?>