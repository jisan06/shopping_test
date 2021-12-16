<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::checkLogin();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

?>

<?php
	
	//Adminlogin
	class Adminlogin{

		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function Adminlogin($username, $password){
			$username = $this->fm->validation($username);
			$password = $this->fm->validation($password);

			$username = mysqli_real_escape_string($this->db->link, $username);
			$password = mysqli_real_escape_string($this->db->link, $password);

			if (empty($username) || empty($password) ) {
				$loginmsg = "Username and password must not be empty";
				return $loginmsg;
			}else{
				$query = "SELECT * from tbl_admin where username = '$username' AND password = '$password' ";
				$result = $this->db->select($query);
				if ($result != false) {
					$value = $result->fetch_assoc();
					Session::set("login", true);
					Session::set("adminId", $value['id']);
					Session::set("adminName", $value['name']);
					Session::set("username", $value['username']);
					header("Location:dashboard.php");
		
				}else{
					$loginmsg = 'Username or Password not match !';
					return $loginmsg;
				}
			}

		}
	}

