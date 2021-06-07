<!doctype html>

<?php
session_start();


require '../../entity/Users.php';
 


$users = new Users;
$userID =  $_SESSION['userid'];
$row = $users->getElementById($userID);

$user = new Users;
$passwordErr='';
if (isset($_POST['submit'])) {
    if (isset($userID)) {
        $flag=0;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword=$_POST['newPassword'];

        if ($users->passwordVerify($oldPassword,$userID)) {
          $user->updatePassword( password_hash($newPassword, PASSWORD_DEFAULT), $userID);
          $passwordErr='done';
          $flag=0;
        }else{
            $passwordErr='inncorrect password';
            $flag=1;
        }

    
    }  
    if ($flag == false) {
        $result='<div class="alert alert-success">data has been updated successfullly</div>';
        }else {
            $result='<div class="alert alert-danger">Sorry there was an error while updating. Please try again later</div>';
        }
        echo $result;
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

        <?php 

        ?>





            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form ml-4" id="addUser">
                <div class="row">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" required placeholder="name" class="form-control" value="<?php echo $row[0]['name'] ?>">
                    </div>
                    <div class="form-group ml-4">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" required placeholder="email" class="form-control" value="<?php echo $row[0]['email'] ?>">
                    </div>

                </div>

                <div class="form-group ml-4">
                    <label for="oldPassword">old password</label>
                    <input type="password" name="oldPassword" id="oldPassword" required class="form-control" value="<?php echo $row[0]['email'] ?>">
                    <?php echo  $passwordErr ?>
                </div>
                <div class="form-group ml-4">
                    <label for="newPassword">new password</label>
                    <input type="password" name="newPassword" id="newPassword" required class="form-control" value="<?php echo $row[0]['email'] ?>">
                </div>

   

   

        <input type="submit" value="submit" name="submit" class="  btn btn-success">
        </form>






    </div>

    </div>

    <?php include('../../includes/admin_includes/scripts.php') ?>
    <script>
        new FroalaEditor('textarea');
    </script>
</body>

</html>