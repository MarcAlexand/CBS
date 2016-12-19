<?php
$beoordelingstype = new \CBS\Controller\ratingTypeController();

$id = $_GET['id'];

$beoordelingstype->delete($id);
echo '<script>location.href="?page=CBS_admin_beoordelingstype_lijst";</script>';

?>

