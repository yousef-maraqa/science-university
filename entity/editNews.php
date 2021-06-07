<?php 
session_start();
   require 'News.php';
 
 //update Event

   $news = new News();
   $message='';
  if (isset($_POST['submit'])) {
      if (isset($_GET['ID'] )) {
          # code...
     
    $newsId=$_GET['ID'] ;
   
            $title = $_POST['title'];
       $body = $_POST['body'];
       $status = $_POST['status'];
       $userid = $_SESSION['userid'];
       $summary = $_POST['summary'];
           try {
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