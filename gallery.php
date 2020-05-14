<?php require_once 'inc/code.inc.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Photo Gallery</title>
</head>

<body>
	<div class="container text-center">
		<h1 class="text-center">Welcome to your gallery</h1>
		<?php if (!empty($message)) {
			echo "<p>{$message}</p>";
		} ?>
		<form action="" method="post" enctype="multipart/form-data">
			<div id="row">
				<div class="custom-file form-inline col-4">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000000">
					<input type="file" name="file_upload" class="custom-file-input" id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
					<input type="submit" class="btn btn-secondary pull-right" name="submit" value="Upload">

				</div>
		</form>
	</div>
	<div class="container text-center">
		<div class="row">
			<?php display_images(); ?>
		</div>
	</div>



</body>

</html>