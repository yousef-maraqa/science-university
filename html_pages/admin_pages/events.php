 <!doctype html>

 <?php
	session_start();


	require('../../entity/Events.php');
	
	require('../../entity/media.php');



	$event = new Events;
	$media= new Media;

	$title = $body = $startDate = $endDate = $location = $status = '';
	if (isset($_POST['submit'])) {
		$title = $_POST['title'];
		$body = $_POST['body'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$date = $_POST['date'];
		$location = $_POST['location'];
		$end_time=	date("H:i:s", strtotime( $_POST['end_time']));
		$start_time=	date("H:i:s", strtotime( $_POST['start_time']));
		$status = $_POST['status'];
		$userid =   $_SESSION['userid'];
		$summary = $_POST['summary'];
		try {
			$event->newEvent($title, $body, $summary, $start_time,$end_time,$date, $location,  $status, $userid);
		} catch (\Throwable $th) {
			echo $th;
		}


		//saving image
		$target_dir = "../../theme/assets/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType =
			strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check !== false) {
				 
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 1000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		  // if everything is ok, try to upload file
		  } else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//   echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			
			$alt = $_POST['alt'];
				$media->insertIMG(htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])),$alt,'event');
			} else {
			  echo "Sorry, there was an error uploading your file.";
			}
		  }
	}
	$row = '';
	$row = $event->fetchAll();
 
 

	if (isset($_GET['delete-submit'])) {
		$id = $_GET['delete'];

		try {
			$event->deleteEvent($id);
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
 					<input type="file" name="fileToUpload" id="fileToUpload">

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
 						<tr>
 							<th>event id</th>
 							<th>user id</th>
 							<th>title</th>
 							<th>body</th>
 							<th>summary</th>
 							<th>start time</th>
 							<th>end time</th>
							 <th>date</th>
 							<th>location</th>
 							<th>status</th>
							 <th>image key</th>
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
 									<input type="hidden" name="delete" value="<?php echo $element['event_id']; ?>">
 									<button type="submit" name="delete-submit" class="btn btn-danger" onclick="confirm('Are you sure?')">DELETE</button>
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
		 if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
		 
 	</script>
 
 </body>

 </html>