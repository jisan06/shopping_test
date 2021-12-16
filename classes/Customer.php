<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

?>

<?php 
	class Customer{
		
		private $db;
		private $fm;
		
	public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function customerRegistration($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$location = mysqli_real_escape_string($this->db->link, $data['location']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$password= mysqli_real_escape_string($this->db->link,md5($data['password']) );

			if ($name == "" || $address == ""  || $phone == "" || $email == "" || $password == "" || $location == "" ) {
			$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
			}

			$mailquery = "SELECT * from tbl_customer where email='$email' limit 1";
			$mailcheck = $this->db->select($mailquery);
			if ($mailcheck!=false) {
				$msg = "<span class='error'>Email Already Exist!</span>";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_customer(name,email,phone,location ,address, password) VALUES('$name', '$email','$phone','$location','$address', '$password')";

			  $customer_insert = $this->db->insert($query);
				if ($customer_insert) {
					$query = "SELECT * from tbl_customer where email = '$email' AND password = '$password'";
					$result = $this->db->select($query);
					$value = $result->fetch_assoc();
					Session::set("custlogin",true);
					Session::set("customerId",$value['id']);
					Session::set("customerName",$value['name']);
					header("Location:index.php");
				}else{
					$msg = "<span class='error'>Registration failed..</span>";
					return $msg;	
				}
			}
		}

		public function customerLogin($data){
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password= mysqli_real_escape_string($this->db->link,md5($data['password']) );
			if (empty($email) || empty($password)) {
				$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
			}

			$query = "SELECT * from tbl_customer where email = '$email' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result!= false) {
				$value = $result->fetch_assoc();
				Session::set("custlogin",true);
				Session::set("customerId",$value['id']);
				Session::set("customerName",$value['name']);
				header("Location:index.php");
			}else{
				$msg = "<span class='error'>Email or Password not matched !</span>";
				return $msg;
			}
		}
	}

?>