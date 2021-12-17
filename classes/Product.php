<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Product{
		const locations = ['Dhaka', 'Rajshahi', 'Chittagong'];
		private $db;
		private $fm;
		public $locations;

	public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

	public function productInsert($data){
		$name = $this->fm->validation($data['name']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$location = mysqli_real_escape_string($this->db->link, $data['location']);
		if ($name == "" || $price == ""  || $location == "") {
			$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
		}else{
		  $query = "INSERT INTO tbl_product(name,price, location) VALUES('$name','$price', '$location')";
		  $productinsert = $this->db->insert($query);
			if ($productinsert) {
				$msg = "<span class='success'>Product Inserted Successfully..</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Product Not Inserted..</span>";
				return $msg;
			}
		}
	}

	public function getAllProduct(){
		$query = "SELECT product.*, count(tbl_order.id) as total_order
		FROM tbl_product as product
		left join tbl_order ON tbl_order.productId = product.id
		GROUP BY product.id ";
		$result = $this->db->select($query);
		return $result;
		}

		public function getProductById($id){
			$query = "SELECT * from tbl_product where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function productUpdate($data, $id){
			$name = $this->fm->validation($data['name']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$location = mysqli_real_escape_string($this->db->link, $data['location']);

			if ($name == "" || $price == ""  || $location == "") {
				$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_product
				set
				name = '$name',
				price = '$price',
				location = '$location'
				where id = '$id'
				";

				$productupdate = $this->db->update($query);
				if ($productupdate) {
					$msg = "<span class='success'>Product Updated Successfully..</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Product Not Updated..</span>";
					return $msg;
				}
			}
		}

		public function delProductById($id){
			$query = "SELECT * from tbl_product where id = '$id'";
			$getdata = $this->db->select($query);

			$delquery = "DELETE from tbl_product
			 where id = '$id'";
			 $deldata = $this->db->delete($delquery);
			 if ($deldata) {
			 	$msg = "<span class='success'>Product Deleted Successfully !</span>";
					return $msg;
			 }else{
			 	$msg = "<span class='error'>Product Not Deleted !</span>";
					return $msg;
			 }
		}
}
?>