<?php include 'inc/header.php'; ?>
<?php
    $login = Session::get('custlogin');
    if ($login == false) {
        header("Location:login.php");
    }
?>

<style>
   .psuccess{width: 500px;min-height: 200px;text-align: center;border: 1px solid ddd;margin: 0 auto;padding: 20px;}
   .psuccess h2{border-bottom: 1px solid #ddd;margin-bottom: 20px; padding-bottom: 10px;}
   .psuccess p{line-height: 25px;text-align: left;font-size: 18px;}
</style>

 <div class="main">
    <div class="content">
        <div class="section group">
        	<div class="psuccess">
        		<h2>Success</h2>
                <p>Thanks for Purchase. Recieve your Order Successfully. We will contact you ASAP with delivery details.Here is your order details...<a href="orderdetails.php">Visit Here</a> </p>
        	</div>
        	

        </div>
    </div>
</div>