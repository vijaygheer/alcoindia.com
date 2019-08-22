<?php include('header.php') ?>

<table  width="100%" border="1px" cellpadding="4px">
  <tr>
    <td>Sr. No.</td><td>Product Name</td><td>Category</td><td>Subategory</td><td>Catalogue Number</td><td>Image</td><td>Title</td><td>Keyword</td><td>Description</td><td>Delete</td><td>Edit</td>
  </tr>
<?php

$psel = "SELECT * FROM product";
$pqry = $conn->query($psel);
$sr = 0;
while($prec = $pqry->fetch_assoc())
{
  $pcat = "SELECT * FROM category where id = $prec[catid]";
  $cqry = $conn->query($pcat);
  $reccat = $cqry->fetch_assoc();

  $pscat = "SELECT * FROM subcategory where id = $prec[subid]";
  $sqry = $conn->query($pscat);
  $recscat = $sqry->fetch_assoc();

  $sr = $sr+1;
  print "<tr>
    <td>$sr</td><td>$prec[pname]</td><td>$reccat[category]</td><td>$recscat[subcategory]</td><td>$prec[cnumber]</td><td>Image</td><td>$prec[title]</td><td>$prec[keyword]</td><td>$prec[descr]</td><td><a href='managepro.php?did=$prec[id]'></td><td>Edit</td>
  </tr>";
}



 ?>
</table>
