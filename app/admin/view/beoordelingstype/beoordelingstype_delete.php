<?php
$coach = new \PMS\Controller\CoachController();

$id = $_GET['id'];

$coach->deleteByCoachId($id);
echo '<script>location.href="?page=PMS_admin_coach_lijst";</script>';

?>

