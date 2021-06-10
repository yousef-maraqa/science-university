<?php 
session_start();
   require 'Users.php';
 
 //update user

   $user = new Users;
  if (isset($_POST['submit'])) {
      if (isset($_GET['ID'] )) {

    $userId=$_GET['ID'] ;
            $is_active = $_POST['active'];
            $role=$_POST['role'];
 
           try {
           $user->updateUsers($is_active,$role , $userId);
           $user->closeConnection();
           $message='data has been updated';
           header('location: ../html_pages/admin_pages/editUsers.php?ID='.$_GET['ID'] .'&message='.$message);
         
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