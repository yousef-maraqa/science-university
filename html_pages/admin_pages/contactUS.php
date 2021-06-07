 
<?php 
session_start();
include ('../../entity/ContactUs.php');
$contactUs=new ContactUs();
$row =$contactUs->fetchAll();
 



if (isset($_GET['delete-submit'])) {
	$id = $_GET['delete'];

	try {
		$contactUs->deleteMessage($id);
		$contactUs->closeConnection();
		header('Location: ' . $_SERVER['PHP_SELF']);
		die;
	} catch (\Throwable $th) {
		echo $th;
	}
}
?>


<!doctype html>
<html lang="en">

<?php include('../../includes/admin_includes/head.php') ?>

<body>

	<div class="wrapper d-flex align-items-stretch">
 		<!-- sidebar  -->
 		<?php include('../../includes/admin_includes/sidebar.php') ?>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

		 
		<div class="table-responsive">
 				<table class="table table-borderd">
 					<thead>
 						<tr>
 							<th>Id</th>
 							<th>Full name</th>
 							<th>Phone number</th>
 							<th>Email</th>
 							<th>Message</th>
 							<th>Created at</th>
 					 


 						</tr>
 					</thead>
 					<?php foreach ($row as $element) : ?>

 						<tr>
 							<?php foreach ($element as $detail) : ?>
 								<td><?php echo $detail ?>
 								</td>

 							<?php endforeach; ?>
 							<td>
 								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
 									<input type="hidden" name="delete" value="<?php echo $element['contact_us_id']; ?>">
 									<button type="submit" name="delete-submit" class="btn btn-danger" onclick="confirm('Are you sure?')">DELETE</button>
 								</form>

 			 

 							</td>

 						</tr>

 					<?php endforeach; ?>
 				</table>
 			</div>

		</div>



 



	</div>


	</div>


    <?php include('../../includes/admin_includes/scripts.php') ?>
</body>

</html>
 
 