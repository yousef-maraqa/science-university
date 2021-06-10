<!doctype html>

<?php
session_start();


require('../../entity/News.php');
require('../../entity/media.php');




$news = new News();
$media =new Media();
$message='';
//ad new news
$title = $body = $startDate = $endDate = $location = $status = '';
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
			if ($fileSize < 500000) {
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



	$title = $_POST['title'];
	$body = $_POST['body'];
	$status = $_POST['status'];
	$userid =   $_SESSION['userid'];
	$alt=$_POST['alt'];
	$summary = $_POST['summary'];
	try {
		$media->insertIMG($image_name,$alt,'news');
		$news->newNews($title, $body,  $summary, $status, $userid);
		$message='data has been added';
	} catch (\Throwable $th) {
		echo $th;
	}
}
//fetch all data
$row = '';
$row = $news->fetchWithImg();
 //delete btn
if (isset($_GET['delete-submit'])) {
	$id = $_GET['delete'];

	try {
		$news->deleteNews($id);
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
		<?php if ($_GET['query']=='deleted') {
	  echo '<div class="alert alert-danger">data has been deleted</div>';
		} ?>
<?php echo $msg; ?>
			<p>
				<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
					Add News
				</a>
			</p>
			<div class="collapse" id="collapseExample">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form ml-4" id="addNews" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group">
							<input type="text" name="title" id="title" required placeholder="title" class="form-control" maxlength="100" rel="txtTooltip" title="maximum 100 characters" data-toggle="tooltip" data-placement="right">
						</div>

					</div>
					<p>
						<a class=" " data-toggle="collapse" href="#summary" role="button" aria-expanded="false" aria-controls="summary"  >
							summary
						</a>
					<div class="collapse" id="summary">
						<input type="text" name="summary" id="summary" placeholder="summary" class="form-control"  maxlength="125" rel="txtTooltip" title="maximum 125 characters" data-toggle="tooltip" data-placement="right">
					</div>
					</p>
					<div class="col col-md-3">
						<label for="file-input" class=" form-control-label">Image</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="file" id="file-input" name="file" class="form-control-file">
					</div>
					<div class="form-group">
							<input type="text" name="alt" id="alt" required placeholder="alternative text" class="form-control"> 
						</div>

					<div class="row my-4">
						<textarea rows="4" cols="50" name="body" required form="addNews">
					   Enter text here...</textarea>
					</div>


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
						<tr style="width:100%">
							<th>news id</th>
							<th>user id</th>
							<th style="width:20%">title</th>
							<th style="width:20%">image</th>
 					 
							<th>status</th>
							<th>created at</th>
						 


						</tr>
					</thead>
					<?php foreach ($row as $element) : ?>

						<tr>
							<td><?php echo $element['news_id'] ?></td>
							<td><?php echo $element['user_id'] ?></td>
							<td><?php echo $element['title'] ?></td>
							<td>
							<div  class="d-flex   justify-content-center" >
							<img style="width: 50%;"  src="../../theme/assets/<?php  echo $element['img_url'] ?>" alt="">
							</div>
							</td>

							<td><?php echo $element['status'] ?></td>
							<td><?php echo $element['created_at'] ?></td>

							<td>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
									<input type="hidden" name="delete" value="<?php echo $element['news_id']; ?>">
									<button type="submit" name="delete-submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE</button>
								</form>

								<a type="submit" name="edit_btn" class="btn btn-success my-1" href="./editNews.php?ID=<?php echo $element['news_id']; ?>">UPDATE</butaton>

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
	</script>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>