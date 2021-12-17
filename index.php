<?php include 'inc/header.php'; ?>
<?php
    $products = $pd->getAllProduct();
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="row">
                <?php
                    foreach ($products as $product){
                ?>
                    <div class="col-md-3 my-3">
                        <a href="checkout.php?productId=<?php echo $product['id']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                        <br>
                        <a href="checkout.php?productId=<?php echo $product['id']; ?>" class="btn btn-success">
                            Buy Now
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
