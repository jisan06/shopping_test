
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

?>



<?php
	class Cart {
		
		private $db;
		private $fm;
		
	public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addToCart($quantity, $id){
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$productId = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$squery = "SELECT * from tbl_product where productId = '$productId'";
			$result = $this->db->select($squery)->fetch_assoc();


			$productName = $result['producttName'];
			$price = $result['price'];
			$image = $result['image'];

			$checkquery = "SELECT * from tbl_cart where productId = '$productId' AND sId = '$sId'";
			 $getpro = $this->db->select($checkquery);
			if ($getpro) {
				$msg = "Product Already Added !";
				return $msg;
			}else{

			$query = "INSERT INTO tbl_cart(sId, productId, producttName, price,quantity, image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

			  $productinsert = $this->db->insert($query);
				if ($productinsert) {
					header("Location: cart.php");
				}else{
					header("Location: 404.php");	
				}
			}
		}

		public function getCartProduct(){
			$sId = session_id();
			$query = "SELECT * from tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function updateToCartQuantoty($cartId, $quantity){
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$query = "UPDATE tbl_cart
				SET 
				quantity = '$quantity'
				where cartId = '$cartId'
				";

				$updatedrow = $this->db->update($query);
				if ($updatedrow ) {
					header("Location:cart.php");
				}else{
					$msg = "<span class='error'>Quantity Not Updated !</span>";
					return $msg;
				}
		}

		public function delProductByCart($delId){
			$query = "DELETE from tbl_cart
			 where cartId = '$delId'";
			 $deldata = $this->db->delete($query);
			 if ($deldata) {
			 	echo "<script>window.location = 'cart.php'</script>";
			 }else{
			 	$msg = "<span class='error'>Product Not Deleted !</span>";
					return $msg;
			 }
		}

		public function checkCartTable(){
			$sId = session_id();
			$query = "SELECT * from tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function delCustomerCart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart where sId = '$sId' ";
			$this->db->select($query);
		}

		public function orderProduct($customerId){
			$sId = session_id();
			
			$query = "SELECT * from tbl_cart where sId = '$sId'";
			$getpro = $this->db->select($query);
			if ($getpro) {
				while ($result = $getpro->fetch_assoc() ) {
					$productId = $result['productId'];
					$productName = $result['producttName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
				$query = "INSERT INTO tbl_order(customerId, productId, productName, quantity, price, image) VALUES('$customerId','$productId','$productName','$quantity', '$price','$image')";

			  	$insertrow = $this->db->insert($query);

				}
			}
		}

		public function payableAmount($customerId){
			$query = "SELECT price from tbl_order where customerId = '$customerId' AND date = now()";
			$result = $this->db->select($query);
			return $result;
		}

		public function getOrederdProduct($customerId){
			$query = "SELECT * from tbl_order where customerId = '$customerId' order by date desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function checkOrder($customerId){
			$query = "SELECT * from tbl_order where customerId = '$customerId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function getAllOrderProduct(){
			$query = "SELECT * from tbl_order order by date";
			$result = $this->db->select($query);
			return $result;	
		}

		public function productShifted($id, $time, $price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$date = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order
				SET 
				status = '1'
				where customerId = '$id' AND date='$date' AND price='$price'
				";

				$updatedrow = $this->db->update($query);
				if ($updatedrow ) {
					$msg = "<span class='success'>Updated Succesfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Not Updated !</span>";
					return $msg;
				}
		}

		public function delProductShifted($id, $date, $price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$date = mysqli_real_escape_string($this->db->link, $date);
			$price = mysqli_real_escape_string($this->db->link, $price);

			 $query = "DELETE from tbl_order where customerId = '$id' AND date='$date' AND price='$price'
				";
			 $deldata = $this->db->delete($query);
			 if ($deldata) {
			 	$msg = "<span class='success'>Data Deleted Successfully !</span>";
					return $msg;
			 }else{
			 	$msg = "<span class='error'>Data Not Deleted !</span>";
					return $msg;
			 }
		}

		public function productShiftConfirm($id, $time, $price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE tbl_order
				SET 
				status = '2'
				where customerId = '$id' AND date='$time' AND price='$price'
				";

				$updatedrow = $this->db->update($query);
				if ($updatedrow ) {
					$msg = "<span class='success'>Updated Succesfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Not Updated !</span>";
					return $msg;
				}

		}

	}

?>