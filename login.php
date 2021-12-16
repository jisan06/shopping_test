<?php include 'inc/header.php'; ?>
<?php
	$login = Session::get('custlogin');
	if ($login == true) {
		header("Location:order.php");
	}
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {
        $customerLogin = $customer->customerLogin($_POST);
    }
?>

 <div class="main">
    <div class="content">
    	<div class="login_panel">
    		<?php  
    			if (isset($customerLogin)) {
    				echo  $customerLogin;
    			}
    		?>

        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" id="member">
                	<input name="email" placeholder="email" type="text">
                    <input name="password" placeholder="password" type="password">
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
    	</div>
            </form>
                  

 <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']) ) {
        $customerReg = $customer->customerRegistration($_POST);
    }
?>
    	<div class="register_account">
    		<?php  
    			if (isset($customerReg)) {
    				echo  $customerReg;
    			}
    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
                 <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="name" required>
                                </div>
                                <div>
                                    <select name="location" id="location" required>
                                        <option value="">Select Location</option>
                                        <?php
                                        foreach (Product::locations as $key) {
                                            ?>
                                            <option value="<?php echo $key ?>"><?php echo $key ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <input type="text" name="address" placeholder="Address">
                                </div>
                             </td>
                            <td>
                                <div>
                                    <input type="text" name="email" placeholder="Email" required>
                                </div>
                                <div>
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>
                                <div>
                                    <input type="text" name="password" placeholder="Password" required>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>