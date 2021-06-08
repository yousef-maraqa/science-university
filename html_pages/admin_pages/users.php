<!doctype html>

<?php
   session_start();


 
   require ('../../entity/Users.php');

   $users = new Users;
   $user_id=$_SESSION['userid'];
   $message='';
	$row=$users->fetchAllToDelete($user_id);
	$name = $email = $password = $role = $is_active = '';
	if (isset($_GET['submit'])) {
		$name=$_GET['name'];
		$email=$_GET['email'];
		$password=$_GET['password'];
		$role=$_GET['role'];
		$is_active=$_GET['active'];
		$hashedPassword=password_hash($password,PASSWORD_DEFAULT); 
	   try {
		   $users->newUser($name, $email, $hashedPassword, $role, $is_active);
		   $message='data has been added';
		 
	   } catch (\Throwable $th) {
		   echo $th;
	   }
	}
	
   if (isset($_GET['delete-submit'])) {
		$id=$_GET['delete'];
	
		try {
		   $users->deleteUser($id);
		   header('Location: ' . $_SERVER['PHP_SELF']);
		   die;
		} catch (\Throwable $th) {
		   echo $th;
		}
	}

	if ($message != '') {
		$msg='<div class="alert alert-success">'.$message.'</div>' ;
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
		<?php echo $msg; ?>




			<p>
				<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
					Add user
				</a>

			</p>
			<div class="collapse" id="collapseExample">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form ml-4" id="addUser">
					<div class="row">
						<div class="form-group">
							<input type="text" name="name" id="name" required placeholder="name" class="form-control">
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" required placeholder="email" class="form-control">
						</div>

					</div>
					<div class="form-group">
							<input type="password" name="password" id="password" required placeholder="password" class="form-control">
						</div>
				 
				 
					
					<select name="role" required class="form-control" maxlength="20">
					<?php   if($_SESSION['role']=='super'){ ?>
						<option value="super">super</option>
						<?php } ?>
						<option value="author">author</option>
					</select>
					<select name="active" required class="form-control">
						<option value="active">active</option>
						<option value="not active">not active</option>
					</select>

					<input type="submit" value="submit" name="submit" class="  btn btn-success">
				</form>

			</div>


			<div class="table-responsive">
				<table class="table table-borderd">
					<thead>
						<tr>
							 
							<th>user id</th>
							<th>name</th>
							<th>email</th>
 							<th>role</th>
							<th>is active</th>
							<th>created at</th>
 

						</tr>
					</thead>
					<?php foreach ($row as $element) : ?>

						<tr>
								<?php foreach ($element as $detail) : ?>
									<td><?php echo $detail ?>
									</td>

								<?php endforeach; ?>
							<td>
							<?php if ($_SESSION['role']=='super' && $element['role']=='author'){ ?>  
							 
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
								 <input type="hidden" name="delete" value="<?php echo $element['user_id']; ?>" >
								 <button type="submit" name="delete-submit" class="btn btn-danger"    onclick="confirm('Are you sure?')">DELETE</button>
								 </form>
								 
								 <a type="submit" name="edit_btn" class="btn btn-success my-1"  href="./editUsers.php?ID=<?php  echo $element['user_id']; ?>" >UPDATE</butaton>
								  <?php } ?>
							</td>

						</tr>

					<?php endforeach; ?>
				</table>
			</div>


		</div>

	</div>

	<?php include('../../includes/admin_includes/scripts.php') ?>
	<script>
		new FroalaEditor('textarea');
	</script>
		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>