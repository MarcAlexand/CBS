<?php
$api_url_link = new \CBS\Controller\LinkController();

$id = $_GET['id'];

$api_url_link->delete($id);
echo '<script>location.href="?page=CBS_admin_url_api_link_lijst";</script>';

?>

