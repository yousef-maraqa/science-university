<!doctype html>

<?php
session_start();


require('../../entity/Slider.php');

require('../../entity/media.php');



$slider = new Slider();
$media = new Media();

$$message='';
if (isset($_POST['submit'])) {
	// get image data
	$file = $_FILES['file'];
	$image_name = $_FILES['file']['name'];
	$tmp_name   = $_FILES['file']['tmp_name'];
	$fileError = $_FILES['file']['error'];
	$fileSize = $_FILES['file']['size'];
	$fileType = $_FILES['file']['type'];
	$fileExt = explode('.', $image_name);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png', 'svg');
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileDestination =  "../../theme/assets/" . $image_name;
				move_uploaded_file($tmp_name, $fileDestination);
			} else {
				echo "Your image is too big";
			}
		} else {
			echo "There was an error Uploading you file";
		}
	} else {
		echo "You can upload jpg,jpeg,png Files";
	}


	$userid =   $_SESSION['userid'];
	$slider_text = $_POST['slider_text'];
	$rank = $_POST['rank'];
	$alt = $_POST['alt'];
	try {
		$media->insertIMG($image_name, $alt, 'slider');
		$slider->newSlider($slider_text, $rank, $userid);
		$message='data has been added';

	} catch (\Throwable $th) {
		echo $th;
	}
}
$row = '';
$row = $slider->fetchAll();



if (isset($_GET['delete-submit'])) {
	$id = $_GET['delete'];

	try {
		$slider->deleteSlider($id);
		header('Location: ' . $_SERVER['PHP_SELF'].'?query=deleted');
		die;
	} catch (\Throwable $th) {
		echo $th;
	}
}
if ($message != '') {
	$msg='<div class="alert alert-success">'.$message.'</div>' ;
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
		<?php 
	if ($_GET['query']=='deleted') {
		echo '<div class="alert alert-danger">data has been deleted</div>';
		  }
		echo $msg;
		
		
		?>




			<p>
				<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
					Add slide
				</a>

			</p>
			<div class="collapse" id="collapseExample">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form ml-4" id="addSlider">
					<div class="row">
						<div class="form-group">
							<input type="text" name="slider_text" rel="txtTooltip" title="maximum 45 characters" data-toggle="tooltip" data-placement="right"  id="slider_text" required placeholder="image_text" class="form-control" maxlength="45">
						</div>

					</div>
					<div class="row">
						<label for="rank">order</label>
						<select name="rank" required class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</div>

					<div class="col col-md-3">
						<label for="file-input" class=" form-control-label">Image</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="file" id="file-input" name="file" class="form-control-file">
					</div>
					<div class="form-group my-4">
						<label for="alt">choose alternative text</label>
						<input type="text" name="alt" id="alt" required placeholder="text..." class="form-control">
					</div>
					</p>


					<select name="status" required class="form-control">
						<option value="published">published</option>
						<option value="unpublished">unpublished</option>

					</select>

					<input type="submit" value="submit" name="submit" class="  btn btn-success">
				</form>

			</div>

			<div class="table-responsive">
				<table class="table table-borderd">
					<thead>
						<tr class="w-100">
							<th>slider id</th>
							<th>user id</th>
							<th>slider text</th>
							<th>order</th>
							<th style="width: 20%;">image</th>
							<th>image alternative text</th>
							<th>sourse</th>
							<th>created at</th>

							<!-- S.slider_id ,S.user_id, S.slider_text,S.order ,S.created_at , M.img_url ,M.img_Alt ,M.sourse -->

						</tr>
					</thead>
					<?php foreach ($row as $element) : ?>

						<tr>
							<td><?php echo $element['slider_id'] ?></td>
							<td><?php echo $element['user_id'] ?></td>
							<td><?php echo $element['slider_text'] ?></td>
							<td><?php echo $element['rank'] ?></td>
							<td>
								<div class="d-flex   justify-content-center">
									<img style="width: 50%;" src="../../theme/assets/<?php echo $element['img_url'] ?>" alt="">
								</div>

							</td>
							<td><?php echo $element['img_Alt'] ?></td>
							<td><?php echo $element['sourse'] ?></td>
							<td><?php echo $element['created_at'] ?></td>


							<td>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
									<input type="hidden" name="delete" value="<?php echo $element['slider_id']; ?>">
									<button type="submit" name="delete-submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE</button>
								</form>

								<a type="submit" name="edit_btn" class="btn btn-success  my-1" href="./editSlider.php?ID=<?php echo $element['slider_id']; ?>">UPDATE</butaton>

							</td>

						</tr>

					<?php endforeach; ?>
				</table>
			</div>


		</div>

	</div>

	<?php include('../../includes/admin_includes/scripts.php') ?>
	<script>
		new FroalaEditor('textarea');
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>

</body>

</html>