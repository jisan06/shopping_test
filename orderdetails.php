<?php include 'inc/header.php'; ?>
<?php
    $login = Session::get('custlogin');
    if ($login == false) {
        header("Location:login.php");
    }
?>

<style type="text/css">
	.tblone tr td{}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>Your Order Details</h2>
                    <table class="tblone">
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Order Status</th>
                        </tr>

                        <?php
                            $customerId = Session::get('customerId');
                            $getOrder = $customer->getOrederdProduct($customerId);
                            if ($getOrder) {
                                $i = 0;
                                $sum = 0;
                                $qty = 0;
                                while ($result = $getOrder->fetch_assoc() ) {
                                    $i++;
                        ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td>$<?php echo $result['price']; ?></td>
                                <td>$<?php echo $result['discount']; ?></td>
                                <td>$<?php echo $result['amount']; ?></td>
                                <td><?php echo $result['status']?></td>
                            </tr>
                        <?php } } ?>
                    </table>
    		    </div>
    	    </div>
    	<div class="clear"></div>
    </div>
 </div>