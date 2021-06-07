<?php 
 session_start();

require('./NavLinks.php');




$link = new NavLinks();
//add new news
$link_id=$_GET['ID'];
 
 if (isset($_POST['submit'])) {
     
	$title = $_POST['title'];
	$path = $_POST['path'];
	$type = $_POST['type'];
	$cluster = $_POST['cluster'];
	$userid =   $_SESSION['userid'];
	
	try {
		$link->updateLink($title, $path,  $type ,$cluster ,  $link_id, $userid);
        $link->closeConnection();
		$message='data has been updated';
		header('location: ../html_pages/admin_pages/editLinks.php?ID='.$_GET['ID'] .'&message='.$message);
	} catch (\Throwable $th) {
		echo $th;
	}
}

?>