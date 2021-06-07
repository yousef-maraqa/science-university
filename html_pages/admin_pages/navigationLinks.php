<!doctype html>

<?php
session_start();


require('../../entity/NavLinks.php');




$link = new NavLinks();
//add new news
 if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$path = $_POST['path'];
	$type = $_POST['type'];
	$cluster = $_POST['cluster'];
	$userid =   $_SESSION['userid'];
	
	try {
		$link->newLink($title, $path,  $type,$cluster, $userid);
	} catch (\Throwable $th) {
		echo $th;
	}
}
//fetch all data
 $row=$link->fetchAll();
//delete btn
if (isset($_GET['delete-submit'])) {
	$id = $_GET['delete'];

	try {
		$link->deleteLink($id);
		header('Location: ' . $_SERVER['PHP_SELF']);
		die;
	} catch (\Throwable $th) {
		echo $th;
	}
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




			<p>
				<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
					Add Link
				</a>

			</p>
			<div class="collapse" id="collapseExample">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form ml-4" id="addLink">
				<select name="cluster" required class="form-control">
						<option value="EXPLORE">EXPLORE</option>
						<option value="QUICK_LINKS">QUICK LINKS</option>
						<option value="USING_OUR_SITE">USING OUR SITE</option>
						<option value="HOW_TO_FIND_US">HOW TO FIND US</option>
						<option value="SOCIAL_LINKS">SOCIAL_LINKS</option>
						<option value="NAVBAR">NAVBAR</option>
			 

					</select>
					<div class="row">
						<div class="form-group">
							<input type="text" name="title" id="title" required placeholder="title" class="form-control">
						</div>

					</div>

					<div class="row">
						<div class="form-group">
							<input type="text" name="path" id="path" required placeholder="path" class="form-control">
						</div>

					</div>
			 


					<select name="type" required class="form-control">
						<option value="header">header</option>
						<option value="footer">footer</option>

					</select>

					<input type="submit" value="submit" name="submit" class="  btn btn-success">
				</form>

			</div>

			<div class="table-responsive">
				<table class="table table-borderd">
					<thead>
						<tr>
							<th>link id</th>
							<th>user id</th>
							<th>cluster title</th>
							<th>title</th>
							<th>path</th>
							<th>type</th>
 							<th>created at</th>
							<th>updated at</th>


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
									<input type="hidden" name="delete" value="<?php echo $element['navigation_id']; ?>">
									<button type="submit" name="delete-submit" class="btn btn-danger" onclick="confirm('Are you sure?')">DELETE</button>
								</form>

								<a type="submit" name="edit_btn" class="btn btn-success" href="./editLinks.php?ID=<?php echo $element['navigation_id']; ?>">UPDATE</butaton>

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
</body>

</html>