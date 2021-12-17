<?php include 'inc/header.php'; ?>
<?php
    $login = Session::get('custlogin');
    if ($login == false) {
        header("Location:login.php");
    }
    $id = $_GET['productId'];
    $getproduct = $pd->getProductById($id);
    if ($getproduct) {
        $product = $getproduct->fetch_assoc();
    }

    $customerId = Session::get("customerId");
    $customer_data = $customer->getCustomerData($customerId);
    $customer_data = $customer_data->fetch_assoc();

    $discount = 0;
    if($customer_data['location'] === $product['location']){
        $discount = ($product['price'] *25) / 100;
    }

    $total = $product['price'] - $discount;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertOrder = $customer->orderProduct($_POST,$customerId);
    }
?>

<div class="main">
    <div class="content">
        <div class="section group">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Order/Product Details</h5>
                       <table class="table table-bordered">
                           <tbody>
                           <tr>
                               <td>Product</td>
                               <td>
                                   <?php echo $product['name']; ?>
                                   <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                               </td>
                           </tr>
                           <tr>
                               <td>Price</td>
                               <td>
                                   <?php echo $product['price']; ?>
                                   <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                               </td>
                           </tr>
                           <tr>
                               <td>Discount</td>
                               <td>
                                   <?php echo $discount ?>
                                   <input type="hidden" name="discount" value="<?php echo $discount; ?>">
                               </td>
                           </tr>
                           <tr>
                               <td>Total</td>
                               <td>
                                   <?php echo $total ?>
                                   <input type="hidden" name="amount" value="<?php echo $total; ?>">
                               </td>
                           </tr>
                           </tbody>
                       </table>

                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary float-end">Submit Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>