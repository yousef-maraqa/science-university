<?php
session_start();


require_once('../config/Database.php');
$database = new Database;
$error = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['name'], $_POST['password']) && !empty($_POST['name']) && !empty($_POST['password'])) {
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);

        $database->query('SELECT name , password , user_id ,role , is_active FROM users WHERE name=:name');
        $database->bind(':name', $name);
        $row = $database->resultset();


        if ($row[0]['name'] == $name && password_verify($password, $row[0]['password'])) {
            if ($row[0]['is_active']=='active') {

                # code...

                $_SESSION["loggedin"] = true;
                $_SESSION['username'] = $name;
                $_SESSION['userid'] = $row[0]['user_id'];
                $_SESSION['role'] = $row[0]['role'];
                //redirect to dashboard
                header("location: ./admin_pages/index.php");
            } else {
                $error='<div class="alert alert-danger">account is not active</div>';
                
            }
        } else {
            $error = '<div class="alert alert-danger">username  or password in not valid</div>';
        }
    } else {
        $error = true;
    }
}
 

?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link href="../styles/css/login.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>



</style>
 </head>

<body>

    <div style="height: 100%;">

    <div class="wrapper fadeInDown" style="height: 100%;">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../theme/assets/group-4@3x.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

 
  </div>
</div>

 
</body>

</html>