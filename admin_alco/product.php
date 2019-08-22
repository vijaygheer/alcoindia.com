<?php include('header.php') ?>
<script type="text/javascript">
function change()
{
  var cid = document.getElementById('selectid').value;
  window.location='product.php?id='+cid;
}
</script>
<form method="POST"   enctype="multipart/form-data">
  <table >
    <tr>
      <td>
         <!--- product category input -->
      Product Category :
      </td>
      <td>
    <select name="pcat" placeholder="category" id="selectid" onchange="change()">
      <option value=''>please select category</option>
    <?php
    $category = "SELECT * from category";
    $catq = $conn->query($category);
    while($reccat = $catq->fetch_assoc())
    {
      if($reccat[id]==$_GET[id])
      {
        $selected="selected";
      }
      else {
        $selected=" ";
      }

      echo "<option value='$reccat[id]' $selected>$reccat[category]</option>";

    }
    ?>

    </select>
      </td>
    </tr>
    <tr>
      <td>
        <!--- product subcategory input -->
      Product subcategory :
      </td>
      <td>
        <select name="psubcat" placeholder="subcategory">
        <option value=''>please select subcategory</option>
        <?php
        $id = $_GET['id'];
        $subcat = "SELECT * from subcategory where catid = $id ";
        $sqry = $conn->query($subcat);
        while($recsub = $sqry->fetch_assoc())
        {


          echo "<option value='$recsub[id]' >$recsub[subcategory]</option>";

        }
        ?>

    </select>
      </td>
    </tr>
    <tr>
      <td>
      Product name :
      </td>
      <td>
        <!--- product name input -->
      <input type="text" name="pname" >
      </td>
    </tr>
    <tr>
      <td>
        <!--- product price input -->
      Catalogue Number  :
      </td>
      <td>
      <input type="text" name="price">
      </td>
    </tr>
    <tr>
      <td>
        <!--- product price input -->
      Product Title  :
      </td>
      <td>
      <input type="text" name="price">
      </td>
    </tr>
    <tr>
      <td>
        <!--- product price input -->
      Product Keyword:
      </td>
      <td>
      <input type="text" name="price">
      </td>
    </tr>
    <tr>
      <td>
        <!--- product description input -->
      Product description :
      </td>
      <td>
      <input type="text" name="pdesc" >
      </td>
    </tr>
    <tr>
      <td>
        <!--- product image input -->
      Product image :
      </td>
      <td>
      <input type="file" name="pimage">
      </td>
    </tr>

    <tr>
      <td>
        <?php echo $msg; ?>
      </td>
      <td>
         <!--- INSERT button  -->
        <button name="addpro">ADD PRODUCT</button>
      </td>
    </tr>
  </table>
  </form>
