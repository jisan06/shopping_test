<?php
    include "lib/Session.php";
    Session::init();
    include "lib/Database.php";
	include "helpers/Format.php";

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

    $db = new Database();
    $fm = new Format();
    $pd = new Product();
    $customer = new Customer();
?>

<?php
    header("Cache-Control:no-cache, must-revalidate");
    header("Pragma:no-cache");
    header("Expires:Sat, 26 JUL 1997 05:00:00 GMT");
    header("Cache-Control:max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Online Shopping</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
    <?php
        if (isset($_GET['custid'])) {
            $customerId = Session::get("customerId");
            Session::destroy();
        }
        $login = Session::get('custlogin');
    ?>
    <div class="menu">
        <ul id="dc_mega-menu-orange" class="dc_mm-orange">
            <li><a href="index.php">Home</a></li>
            <?php
                if ($login == true) {
            ?>
                <li>
                    <a href="orderdetails.php">Order List</a>
                </li>
            <?php } ?>
            <li>
                <?php
                    if ($login == false) {
                ?>
                    <a href="login.php">Login</a>
                <?php }else{  ?>
                    <a href="?custid=<?php Session::get('customerId'); ?>">Logout</a>
                <?php } ?>
            </li>
          <div class="clear"></div>
        </ul>
    </div>
	