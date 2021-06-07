<?php 
require ('./Slider.php');
$slider =new Slider();
   if (isset($_POST['submit'])) {
    $slider_id=$_GET['ID'] ;
    $slider_text = $_POST['slider_text'];
    $rank = $_POST['rank'];
    try {
        $slider->updateSlider($slider_text , $rank , $slider_id);
        $slider->closeConnection();
        $message='data has been updated';
        header('location: ../html_pages/admin_pages/editSlider.php?ID='.$_GET['ID'] .'&message='.$message);
    } catch (\Throwable $th) {
        echo $th;
    }
   }
?>