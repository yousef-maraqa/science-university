
<head>
<?php
if ( $_SESSION['userid']==null) {
	header('location :../../html_pages/login.php');
}
 
?>
	<title>admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../../theme/node_modules/@fortawesome/fontawesome-free/css/all.css">
	<link rel="stylesheet" href="../../theme/admin_themes/css/style.css">
</head>