<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
	$pd = new Product();
	$fm = new Format();
?>

<?php 
	if (isset($_GET['delproduct'])) {
		$id = $_GET['delproduct'];
		$delproduct = $pd->delProductById($id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
        <?php
            if (isset($delproduct)) {
                echo $delproduct;
            }
        ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$getpd = $pd->getAllProduct();
					if ($getpd) {
						$i = 0;
						while ($result = $getpd->fetch_assoc() ) {
							$i++;
				?>

				<tr class="odd gradeX">
					<th><?php echo $i; ?></th>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $result['price']; ?></td>
					<td><?php echo $result['location']; ?></td>
					<td><a href="productedit.php?productid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete!')" href="?delproduct=<?php echo $result['id']; ?>">Delete</a></td>

			<?php } } ?>
				</tr>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
