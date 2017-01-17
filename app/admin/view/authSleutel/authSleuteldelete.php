<?php
$api_url_link = new \CBS\Controller\AuthKeyController();

$id = $_GET['id'];

$api_url_link->delete($id);
echo '<script>location.href="?page=CBS_admin_url_authSleutel_lijst";</script>';

?>

