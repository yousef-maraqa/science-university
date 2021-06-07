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
<?php include('../includes/header.php'); ?>

<body>

    <div class="container">

        <div id="login-container">
            <div class="form-wrap">
                <h1>Login</h1>
                <p>Please fill in your credentials to login.</p>
                <span class="error" style="display: block;text-align: center;"></span>
                <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group ">
                        <label>Username / name</label>
                        <input type="text" required name="name" class="form-control">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" required name="password" class="form-control">
                        <span class="help-block"> </span>
                        <?php echo $error; ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">login</button>

                </form>
            </div>
        </div>



        <!-- js scripts  -->
        <?php include('../includes/scripts.php') ?>
</body>

</html>