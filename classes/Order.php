<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

?>

<?php 
	class Order{
		
		private $db;
		private $fm;
		
	public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function orderList(){
			$query = "SELECT tbl_order.*, tbl_product.name as productName, tbl_customer.name as customerName from tbl_order
			INNER JOIN tbl_product 
			ON tbl_order.productId = tbl_product.id
			INNER JOIN tbl_customer 
			ON tbl_order.customerId = tbl_customer.id
			order by id desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getOrderData($id){
			$query = "SELECT tbl_order.*, tbl_product.name as productName, tbl_customer.name as customerName, tbl_customer.location as  customerLocation from tbl_order
			INNER JOIN tbl_product 
			ON tbl_order.productId = tbl_product.id
			INNER JOIN tbl_customer 
			ON tbl_order.customerId = tbl_customer.id
			where tbl_order.id = '$id' order by id desc ";
			$result = $this->db->select($query);
			return $result;
		}
	}

?>