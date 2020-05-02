<?php require_once 'inc/code.inc.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Photo Gallery</title>
</head>

<body>

	<?php if (!empty($message)) {
		echo "<p>{$message}</p>";
	} ?>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="100000000">
		<input type="file" name="file_upload">
		<input type="submit" name="submit" value="Upload">
	</form>
	<?php display_images(); ?>


</body>

</html>