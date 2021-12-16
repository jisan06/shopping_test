<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>


<?php
    if (!isset($_GET['productid']) || $_GET['productid'] == NULL ) {
        echo "<script>window.location = 'productlist.php'</script>";
    }else{
        $id = $_GET['productid'];
    }
    $pd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateproduct = $pd->productUpdate($_POST, $id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
        <?php
            if (isset($updateproduct)) {
                echo $updateproduct;
            }
        ?>
        <?php
            $getproduct = $pd->getProductById($id);
            if ($getproduct) {
                while ($value = $getproduct->fetch_assoc() ) {

        ?>
             <form action="" method="post" enctype="multipart/form-data">
                 <div class="row">
                     <div class="col-md-4">
                         <div class="form-group">
                             <label for="name">Product Name</label>
                             <input name="name" type="text" class="form-control" id="name" value="<?php echo $value['name']; ?>" required>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                             <label for="price">Product Price</label>
                             <input name="price" type="number" class="form-control" id="price" value="<?php echo $value['price']; ?>" required>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                             <label for="location">Location</label>
                             <select name="location" id="location" class="form-control" required>
                                 <option value="">Select Location</option>
                                 <?php
                                    foreach (Product::locations as $key) {
                                        if($value['location'] == $key){
                                            $selected = 'selected';
                                        }else{
                                            $selected = '';
                                        }
                                 ?>
                                     <option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $key ?></option>

                                 <?php } ?>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="row mt-2">
                     <div class="col-md-12 text-right">
                         <button class="btn btn-primary float-end">Update</button>
                     </div>
                 </div>
            </form>
        <?php } } ?> 
        </div>
    </div>
</div>


