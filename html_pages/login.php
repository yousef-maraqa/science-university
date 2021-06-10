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
 <link href="../theme/css/login.css" rel="stylesheet" >
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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
      <img src="../theme/assets/group-4@3x.png" id="icon" alt="User Icon"  class="my-4"/>
    </div>

    <!-- Login Form -->
    <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="text" id="name" class="fadeIn second" name="name" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <?php echo $error; ?>
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

 
  </div>
</div>

 
</body>

</html>