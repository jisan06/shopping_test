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

	public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

	public function productInsert($data, $file){
		$name = $this->fm->validation($data['name']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$location = mysqli_real_escape_string($this->db->link, $data['location']);
		if ($name == "" || $price == ""  || $location == "") {
			$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
			}
		else{
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
		$query = "SELECT p.*,c.catName,b.brandName
		FROM tbl_product as p, tbl_category as c,tbl_brand as b
		WHERE p.catId = c.catId AND p.brandId = b.brandId
		order by p.id desc";

/*
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
		FROM tbl_product
		INNER JOIN tbl_category
		ON tbl_product.catId = tbl_category.catId
		INNER JOIN tbl_brand
		ON tbl_product.brandId = tbl_brand.brandId
		 ORDER BY tbl_product.id DESC";
*/

		$result = $this->db->select($query);
		return $result;
		}

		public function getProductById($id){
			$query = "SELECT * from tbl_product where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function productUpdate($data,$file, $id){

			$name = $this->fm->validation($data['name']);
			$catId      = mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
			$body 	 = mysqli_real_escape_string($this->db->link, $data['body']);
			$price 		= mysqli_real_escape_string($this->db->link, $data['price']);
			$type 		 = mysqli_real_escape_string($this->db->link, $data['type']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_temp = $file['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if ($name == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
			$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
			}else{
				if (!empty($file_name)) {

					if ($file_size >1048567) {
					echo "<span class='error'>Image Size should be less then 1MB!
					</span>";
					} elseif (in_array($file_ext, $permited) === false) {
					echo "<span class='error'>You can upload only:-"
					.implode(', ', $permited)."</span>";
					}
					else{
					 move_uploaded_file($file_temp, $uploaded_image);

					  $query = "UPDATE tbl_product
					  set
					  name = '$name',
					  catId  	   = '$catId',
					  brandId      = '$brandId',
					  body 		   = '$body',
					  price 	   = '$price',
					  image 	   = '$uploaded_image',
					  type 		   = '$type'
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

			}else{

				  $query = "UPDATE tbl_product
				  set
				  name = '$name',
				  catId  	   = '$catId',
				  brandId      = '$brandId',
				  body 		   = '$body',
				  price 	   = '$price',
				  type 		   = '$type'
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

		}

		public function delProductById($id){
			$query = "SELECT * from tbl_product where id = '$id'";
			$getdata = $this->db->select($query);
			if ($getdata) {
				while ($delImg = $getdata->fetch_assoc() ) {
					$dellink =  $delImg['image'];
					unlink($dellink);
				}
			}

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

		public function getFeaturedProduct(){
			$query = "SELECT * from tbl_product where type='0' order by id desc limit 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function getNewProduct(){
			$query = "SELECT * from tbl_product order by id asc limit 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function getSingleProduct($id){
			$query = "SELECT p.*,c.catName,b.brandName
			FROM tbl_product as p, tbl_category as c,tbl_brand as b
			WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.id = '$id' ";
			$result = $this->db->select($query);
			return $result;

		}

		public function latestFromIphone(){
			$query = "SELECT * from tbl_product where brandId = '3' order by id DESC limit 1";
			$result = $this->db->select($query);
			return $result;

		}

		public function latestFromSamsung(){
			$query = "SELECT * from tbl_product where brandId = '2' order by id DESC limit 1";
			$result = $this->db->select($query);
			return $result;

		}

		public function latestFromAcer(){
			$query = "SELECT * from tbl_product where brandId = '1' order by id DESC limit 1";
			$result = $this->db->select($query);
			return $result;

		}

		public function latestFromCanon(){
			$query = "SELECT * from tbl_product where brandId = '6' order by id DESC limit 1";
			$result = $this->db->select($query);
			return $result;

		}

		public function productByCat($id){
			$catId 		 = mysqli_real_escape_string($this->db->link, $id);
			$query = "SELECT * from tbl_product where catId = '$catId'";
			$result = $this->db->select($query);
			return $result;

	}

		public function insertCompareData($customerId, $product_id ){
			$customerId = mysqli_real_escape_string($this->db->link, $customerId);
			$product_id   = mysqli_real_escape_string($this->db->link, $product_id );

			$checkquery = "SELECT * from tbl_compare where customerId = '$customerId' AND id ='$product_id  '";
			$check = $this->db->select($checkquery);
			if ($check) {
						$msg = "<span class='error'>Already Added !</span>";
						return $msg;
					}		

			$query = "SELECT * from tbl_product where id = '$product_id '";
				$result = $this->db->select($query)->fetch_assoc();
				if ($result) {
						$product_id  = $result['id'];
						$name = $result['name'];
						$price = $result['price'];
						$image = $result['image'];
					$query = "INSERT INTO tbl_compare(customerId, id, name, price, image) VALUES('$customerId','$product_id ','$name', '$price','$image')";

				  	$inserted_row = $this->db->insert($query);
				  	if ($inserted_row) {
				  		$msg = "<span class='success'>Added! Check Compare Page</span>";
						return $msg;			  	
					}else{
						$msg = "<span class='error'>Not Added !</span>";
						return $msg;
					}
				}	
		}

		public function getComparedData($customerId ){
				$query = "SELECT * from tbl_compare where customerId='$customerId' order by id desc";
				$result = $this->db->select($query);
				return $result;
		}

		public function delCompareData($customerId){
			$delquery = "DELETE from tbl_compare where customerId = '$customerId'";
			$deldata = $this->db->select($delquery);
			return $deldata;
		}

		public function saveWishlistData($id, $customerId){
			$checkquery = "SELECT * from tbl_wlist where customerId = '$customerId' AND id ='$id '";
			$check = $this->db->select($checkquery);
			if ($check) {
						$msg = "<span class='error'>Already Added !</span>";
						return $msg;
					}

			$pquery = "SELECT * from tbl_product where id = '$id'";
			$result = $this->db->select($pquery)->fetch_assoc();
			if ($result) {
					$product_id  = $result['id'];
					$name = $result['name'];
					$price = $result['price'];
					$image = $result['image'];
				$query = "INSERT INTO tbl_wlist(customerId, id, name, price, image) VALUES('$customerId','$product_id ','$name', '$price','$image')";

			  	$inserted_row = $this->db->insert($query);
				  	if ($inserted_row) {
				  		$msg = "<span class='success'>Added! Check WishList Page</span>";
						return $msg;			  	
					}else{
						$msg = "<span class='error'>Not Added !</span>";
						return $msg;
					}
			}
		}

		public function getWlist($customerId){
			$query = "SELECT * FROM tbl_wlist where customerId = '$customerId'";
			$result = $this->db->select($query);
			return $result;	
		}

		public function delWlistData($customerId, $product_id ){
			$delquery = "DELETE from tbl_wlist where customerId = '$customerId' AND id = '$product_id '";
			$deldata = $this->db->delete($delquery);

		}

}

?>