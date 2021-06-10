 <!doctype html>

 <?php
	session_start();


	require('../../entity/Events.php');

	require('../../entity/media.php');



	$event = new Events;
	$media = new Media;

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
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$date = $_POST['date'];
		$location = $_POST['location'];
		$end_time =	date("H:i:s", strtotime($_POST['end_time']));
		$start_time =	date("H:i:s", strtotime($_POST['start_time']));
		$status = $_POST['status'];
		$userid =   $_SESSION['userid'];
		$summary = $_POST['summary'];
		$alt = $_POST['alt'];
		try {
			$media->insertIMG($image_name,$alt,'events');
			$event->newEvent($title, $body, $summary, $start_time, $end_time, $date, $location,  $status, $userid);
		} catch (\Throwable $th) {
			echo $th;
		}
	}
	$row = '';
	$row = $event->fetchWithImg();

 

	if (isset($_GET['delete-submit'])) {
		$id = $_GET['delete'];

		try {
			$event->deleteEvent($id);
			header('Location: ' . $_SERVER['PHP_SELF'].'?query=deleted');
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

		 <?php if ($_GET['query']=='deleted') {
	  echo '<div class="alert alert-danger">data has been deleted</div>';
		} ?>


 			<p>
 				<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
 					Add Event
 				</a>

 			</p>
 			<div class="collapse" id="collapseExample">
 				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form ml-4" id="addEvent">
 					<div class="row">
 						<div class="form-group">
 							<input type="text" name="title" id="title" required placeholder="title" class="form-control">
 						</div>

 					</div>
 					<p>
 						<a class=" " data-toggle="collapse" href="#summary" role="button" aria-expanded="false" aria-controls="summary">
 							summary
 						</a>
 					<div class="collapse" id="summary">
 						<input type="text" name="summary" id="summary" placeholder="summary" class="form-control">
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
 					<div class="row my-4">
 						<textarea rows="4" cols="50" name="body" required form="addEvent">
						Enter text here...</textarea>
 					</div>
 					<div class="form-group">
 						<input type="date" name="date" id="date" required placeholder="date" class="form-control">
 					</div>
 					<div class="row d-flex form-group">
 						<input type="time" name="start_time" id="start_time" required placeholder="start time" class=" form-control  ">
 						<input type="time" name="end_time" id="end_time" required placeholder="end time" class="form-control">
 					</div>

 					<div class="form-group">
 						<input type="text" name="location" id="location" required placeholder="location" class="form-control">
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
 						<tr  class="w-100">
 							<th>event id</th>
 							<th style="width: 10%;">title</th>
 							<th>summary</th>
 							<th style="width: 20%;">image </th>
 							<th>status</th>

 							<th>created at</th>


 						</tr>
 					</thead>
 					<?php foreach ($row as $element) : ?>

 						<tr>
 							<td><?php echo $element['event_id']; ?></td>
 							<td><?php echo $element['title']; ?></td>
 							<td><?php echo $element['summary']; ?></td>
 							<td>
 								<div class="d-flex   justify-content-center">
 									<img style="width: 50%;" src="../../theme/assets/<?php echo $element['img_url'] ?>" alt="">
 								</div>
 							</td> 
 							<td><?php echo $element['status']; ?></td>
 							<td><?php echo $element['created_at']; ?></td>
							 <td>
 							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
 								<input type="hidden" name="delete" value="<?php echo $element['event_id']; ?>">
 								<button type="submit" name="delete-submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE</button>
 							</form>

 							<a type="submit" name="edit_btn" class="btn btn-success" href="./editEvent.php?ID=<?php echo $element['event_id']; ?>">UPDATE</butaton>

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