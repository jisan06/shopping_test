<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Order.php'; ?>

<?php
    $order = new Order();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
                            <th>Customer</th>
							<th>Product</th>
							<th>Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $getOrder = $order->orderList();
                    if ($getOrder) {
                        $i = 0;
                        while ($result = $getOrder->fetch_assoc() ) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['customerName']; ?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td>$<?php echo $result['amount']; ?></td>
                                <td>
                                    <a href="orderDetails.php?orderId=<?php echo $result['id']; ?>">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        <?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
