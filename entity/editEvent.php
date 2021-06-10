<?php 
session_start();
   require 'Events.php';
 
 //update Event

   $event = new Events;
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
				$fileDestination =  "../theme/assets/". $image_name;
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

      if (isset($_GET['ID'] )) {
    $eventId=$_GET['ID'] ;
      $title = $_POST['title'];
       $body = $_POST['body'];
       $start_time = $_POST['start_time'];
       $end_time = $_POST['end_time'];
       $date = $_POST['date'];
       $location = $_POST['location'];
       $status = $_POST['status'];
       $userid = $_SESSION['userid'];
       $summary = $_POST['summary'];
       $alt = $_POST['alt'];
   
           try {
                   if ($image_name !='') {
                $media->updateIMG($image_name,$alt,'news',$media_id );
               }
           $event->updateEvent($title, $body, $start_time, $end_time, $date,  $location, $summary, $status, $userid,  $eventId);
        
           header('location: ../html_pages/admin_pages/events.php');
 
       } catch (\Throwable $th) {
           echo $th;
       }

    }else{
        echo 'id is not assigned';
    }
 }else{
    echo 'form is not submitted';
}


?>