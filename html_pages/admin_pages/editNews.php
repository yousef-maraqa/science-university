<!doctype html>

<?php
session_start();


require('../../entity/News.php');




$news = new News();
$news_id=$_GET['ID'];
if (isset($_GET['message'])) {
	$message='<div class="alert alert-success">'.$_GET['message'].'</div>' ;
}


$row=$news->getElementById($news_id);
 $news->closeConnection();
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
 
 
				<form action="../../entity/editNews.php?ID=<?php echo $_GET['ID'];  ?>" method="post" class="form ml-4" id="editNews">
					<div class="row">
						<div class="form-group">
							<input type="text" name="title" id="title" required placeholder="title" class="form-control" value="<?php echo $row[0]['title'] ?>">
						</div>

					</div>
					<p>
						<a class=" " data-toggle="collapse" href="#summary" role="button" aria-expanded="false" aria-controls="summary">
							summary
						</a>
					<div class="collapse" id="summary">
						<input type="text" name="summary" id="summary" placeholder="summary" class="form-control" value="<?php echo $row[0]['summary'] ?>">
					</div>

					</p>
					<div class="row my-4">
						<textarea rows="4" cols="50" name="body" required   >
						<?php echo $row[0]['body'] ?> </textarea>
					</div>


					<select name="status" required class="form-control" value="<?php echo $row[0]['status'] ?>">
						<option value="published">published</option>
						<option value="unpublished">unpublished</option>
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