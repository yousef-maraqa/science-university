 <?php
 session_start();
 if ( $_SESSION["loggedin"]) {
       
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
	 <h1>hello <?php    echo $_SESSION['username'] ?></h1>

			</div>
		</div>
	</div>


	</div>

 

<?php include('../../includes/admin_includes/scripts.php') ?>
</body>
<?php }else{
header('location: ../login.php');

}?>

</html>
 
 