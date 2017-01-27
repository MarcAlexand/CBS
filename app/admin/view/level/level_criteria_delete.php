<?php
$levelstype = new \CBS\Controller\levelCriteriaController();

$id = $_GET['id'];

$levelstype->delete($id);
echo '<script>location.href="?page=CBS_admin_level_lijst";</script>';

?>

