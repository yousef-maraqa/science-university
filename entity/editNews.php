<?php 
session_start();
   require 'News.php';
   require 'media.php';
  //update Event
    $news = new News();
   $media = new Media();
 
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
          # code...
     
    $newsId=$_GET['ID'] ;
    $media_id=$_GET['media'] ;
   
            $title = $_POST['title'];
       $body = $_POST['body'];
       $status = $_POST['status'];
       $userid = $_SESSION['userid'];
       $summary = $_POST['summary'];
       $message='';
       $alt = $_POST['alt'];
           try {
               if ($image_name !='') {
                $media->updateIMG($image_name,$alt,'news',$media_id );
               }
     
           $news->updateNews($title, $body , $summary, $status,$newsId, $userid  );
           $news->closeConnection();
           $message='data has been updated';
           header('location: ../html_pages/admin_pages/editNews.php?ID='.$_GET['ID'] .'&message='.$message);
        
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