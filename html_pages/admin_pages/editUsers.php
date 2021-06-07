<!doctype html>

<?php
   session_start();
   require '../../entity/Users.php';
   $users = new Users;
$userID =$_GET['ID'] ;
 $row=$users->getElementById($userID );
$users->closeConnection();
if (isset($_GET['message'])) {
	$message='<div class="alert alert-success">'.$_GET['message'].'</div>' ;
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
        <?php echo $message ?>
        <form action='../../entity/editUser.php?ID=<?php echo $_GET['ID'];  ?>' method="POST" class="form ml-4" id="addUser">
					<div class="row">
						<div class="form-group">
                        <label for="name">name</label>
							<input type="text" readonly name="name" id="name" required placeholder="name" class="form-control" value="<?php echo $row[0]['name'] ?>">
						</div>
						<div class="form-group ml-4">
                        <label for="email">email</label>
							<input type="email" readonly name="email" id="email" required placeholder="email" class="form-control" value="<?php echo $row[0]['email'] ?>">
						</div>
					</div>	 
                    <div class="form-group">
                    <label for="role">role</label>
                    <?php echo $row[0]['role'] ?>
							<input type="text" readonly name="role" id="role" required placeholder="role" class="form-control" value="<?php echo $row[0]['role'] ?>">
						</div>
					<select name="active" required class="form-control" value="<?php echo $row[0]['is_active'] ?>">
						<option value="active">active</option>
						<option value="notActive">not active</option>
					</select>

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