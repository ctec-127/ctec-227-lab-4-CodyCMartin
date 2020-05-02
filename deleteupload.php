<?php
if (isset($_GET['file'])) {
    unlink("uploads/" . $_GET['file']);
    header("location: gallery.php");
}
