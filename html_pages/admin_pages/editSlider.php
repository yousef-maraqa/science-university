<!doctype html>

<?php
session_start();


require('../../entity/Slider.php');




$slider = new Slider();
$slider_id = $_GET['ID'];
$row = $slider->getElementById($slider_id);
$slider->closeConnection();
if (isset($_GET['message'])) {
	$message='<div class="alert alert-success">'.$_GET['message'].'</div>' ;
}
?>
<html lang="en">

<?php include('../../includes/admin_includes/head.php') ?>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<!-- sidebar  -->
		<?php include('../../includes/admin_includes/sidebar.php') ?>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

		<?php echo $message; ?>



			<form action='../../entity/editSlider.php?ID=<?php echo $_GET['ID'];  ?>' method="post" enctype="multipart/form-data" class="form ml-4" id="addSlider">
				<div class="row">
					<div class="form-group">
						<input type="text" name="slider_text" id="slider_text" required placeholder="image_text" class="form-control" value="<?php echo $row[0]['slider_text']; ?>" maxlength="45">
					</div>

				</div>

				<select name="rank" required class="form-control" value="<?php echo $row[0]['rank']; ?>">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>

				</select>




				<input type="submit" value="submit" name="submit" class="  btn btn-success">
			</form>





		</div>

	</div>

	<?php include('../../includes/admin_includes/scripts.php') ?>
	<script>
		new FroalaEditor('textarea');
	</script>
</body>

</html>