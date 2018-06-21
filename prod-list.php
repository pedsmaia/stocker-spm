<?php

$title = "List Products";

include 'header.php';

?>

<section>

<?php

$sql2 = mysqli_query($link, "SELECT * FROM product");
$result = mysqli_query($link,$sql2);
if(!empty($sql2)){
?>

<div class="container-fluid">
<table class="table table-sm small">
  <thead class="thead-dark">
    <tr>
      <th class="p_id">Product Code</th>
      <th>Name</th>
      <th>Location</th>
      <th>Current Stock (new)</th>
      <th> (used)</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
<tbody>

<?
while ($row = $sql2->fetch_assoc()){ ?>
<tr class="class<?php echo ($xyz++%2); ?>">
<td class="p_id"><?php echo $row['id']; ?> </td><td><a href="productview.php?id=<?= $row['id'] ?>"><?php echo $row['name']; ?></a> </td><td> <?php echo $row['p_location'] . ' - ' . $row['location']; ?> </td><td> <?php echo $row['c_stock']; ?></td><td> <?php echo $row['u_stock']; ?></td>
<td class="icons"><a href="productview.php?id=<?= $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> <a href="productnew.php?id=<?= $row['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <i class="fa fa-trash-o" aria-hidden="true"></i></td></tr>
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