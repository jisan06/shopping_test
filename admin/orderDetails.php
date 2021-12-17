<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Order.php'; ?>

<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/Customer.php');
    $order = new Order();
    $order_data = $order->getOrderData($_GET['orderId']);
    $result = $order_data->fetch_assoc();
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $status_update = $order->statusUpdate($_POST, $_GET['orderId']);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order Details</h2>
               <div class="block copyblock">
                 <form action="" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td>Customer Name</td>
                            <td>
                                <?php echo $result['customerName'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Location</td>
                            <td>
                                <?php echo $result['customerLocation'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Product</td>
                            <td>
                                <?php echo $result['productName'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Price</td>
                            <td>
                                <?php echo $result['price'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Discount</td>
                            <td>
                                <?php echo $result['discount'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Total</td>
                            <td>
                                <?php echo $result['amount'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>status</td>
                            <td>
                                <select name="status" id="">
                                    <option value="">Select Status</option>
                                    <?php
                                        foreach (Order::status as $status){
                                            if($result['status'] == $status){
                                                $selected = 'selected';
                                            }else{
                                                $selected = '';
                                            }
                                    ?>
                                        <option value="<?php echo $status?>" <?php echo $selected?>><?php echo $status?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>

                     <a href="order.php" class="btn btn-info">Order List</a>
                     <button class="btn btn-success">Update Status</button>
                </form>
                </div>
            </div>
        </div>