<?php 
require ('./Slider.php');
require 'media.php';

$slider =new Slider();
$media= new Media();
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

    $slider_id=$_GET['ID'] ;
    $media_id=$_GET['media'];
    $slider_text = $_POST['slider_text'];
    $rank = $_POST['rank'];
    $alt = $_POST['alt'];
    try {
        if ($image_name !='') {
        $media->updateIMG($image_name,$alt,'slider',$media_id );
        }
        $slider->updateSlider($slider_text , $rank , $slider_id);
        $slider->closeConnection();
        $message='data has been updated';
        header('location: ../html_pages/admin_pages/editSlider.php?ID='.$_GET['ID'] .'&message='.$message);
    } catch (\Throwable $th) {
        echo $th;
    }
   }
?>