<?php 
session_start();
   require 'Events.php';
 
 //update Event

   $event = new Events;
  if (isset($_POST['submit'])) {
      if (isset($_GET['ID'] )) {
          # code...
     
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
   
           try {
              
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