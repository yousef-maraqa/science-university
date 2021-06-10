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
 
 
				<form action="../../entity/editNews.php?ID=<?php echo $_GET['ID'];?>&media=<?php echo $row[0]['media_id']; ?>" method="post" class="form ml-4" id="editNews" enctype="multipart/form-data">
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
					<div class="row my-4" style="width: 65%;">
						<textarea rows="4" cols="50" name="body" required   >
						<?php echo $row[0]['body'] ?> </textarea>
					</div>
					<h2>current image</h2>
					<div class="row my-4" style="width: 50%;">
					<img class="w-100" src="../../theme/assets/<?php echo $row[0]['img_url']  ?>" >
					</div>
					<div class="col-12 col-md-9">
						<input type="file" id="file-input" name="file" class="form-control-file">
					</div>
					<div class="form-group">
							<label for="alt" class="my-3">alternative text </label>
							<input type="text" name="alt" id="alt" required placeholder="alternative text" class="form-control" value="<?php echo $row[0]['img_Alt'] ?>"> 
						</div>

					<select name="status" required class="form-control" >
						<option value="published" <?php if ($row[0]['status']=='published') echo "selected='selected'";?>>published</option>
						<option value="unpublished"  <?php if ($row[0]['status']=='unpublished') echo "selected='selected'";?>>unpublished</option>
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