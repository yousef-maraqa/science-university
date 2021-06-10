<!doctype html>

<?php
session_start();
error_reporting(0);

require('../../entity/NavLinks.php');




$link = new NavLinks();
$link_id=$_GET['ID'];
 

//fetch all data
 $row=$link->getElementById($link_id);
 
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
$link->closeConnection();
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
				<form action='../../entity/editLinks.php?ID=<?php echo $_GET['ID'];  ?>'  method="post" class="form ml-4" id="addLink">
				<select name="cluster" required class="form-control" >
						<option value="EXPLORE" <?php if ($row[0]['cluster_title']=='EXPLORE') echo "selected='selected'";?> >EXPLORE</option>
						<option value="QUICK_LINKS"  <?php if ($row[0]['cluster_title']=='QUICK_LINKS') echo "selected='selected'";?> >QUICK LINKS</option>
						<option value="USING_OUR_SITE"  <?php if ($row[0]['cluster_title']=='USING_OUR_SITE') echo "selected='selected'";?> >USING OUR SITE</option>
						<option value="HOW_TO_FIND_US" <?php if ($row[0]['cluster_title']=='HOW_TO_FIND_US') echo "selected='selected'";?> >HOW TO FIND US</option>
                        <option value="SOCIAL_LINKS" <?php if ($row[0]['cluster_title']=='SOCIAL_LINKS') echo "selected='selected'";?> >SOCIAL_LINKS</option>
                        <option value="NAVBAR" <?php if ($row[0]['cluster_title']=='NAVBAR') echo "selected='selected'";?> >NAVBAR</option>
					</select>
				 
					<div class="row">
						<div class="form-group">
							<input type="text" name="title" id="title" required placeholder="title" class="form-control"   value="<?php echo $row[0]['title'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="text" name="path" id="path" required placeholder="path" class="form-control"  value="<?php echo $row[0]['path'] ?>">
						</div>
					</div>
					<select name="type" required class="form-control">
						<option value="header"  <?php if ($row[0]['type']=='header') echo "selected='selected'";?> >header</option>
						<option value="footer"  <?php if ($row[0]['type']=='footer') echo "selected='selected'";?> >footer</option>

					</select>

					<input type="submit" value="submit" name="submit" class="  btn btn-success">
				</form>
		</div>
	</div>
	<?php include('../../includes/admin_includes/scripts.php') ?>
</body>

</html>