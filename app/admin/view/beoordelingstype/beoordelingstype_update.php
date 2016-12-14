<?php

$coach = new \PMS\Controller\CoachController();
$form_validator_object = new \PMS\Model\FormValidator();

$id = $_GET['id'];

$coach_object = $coach->getCoachById($id);
$coach_object_list = $coach_object->getList();

if (isset($_POST['submit_coach_aanpassen']) && !empty($_POST['submit_coach_aanpassen'])) {
    // Validate the input data from the form
    $coach_form_data = $form_validator_object->coachFormValidator();
    $coach->editForm($coach_form_data);
    echo '<script>location.href="?page=PMS_admin_coach_lijst";</script>';
}
?>

<div class="wrap">
    <h1><?php _e( 'Coach aanpassen', 'IVS Highscore' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
            <tr class="row-klas">
                <th scope="row">
                    <label for="coach"><?php _e( 'Coach', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="hidden" name="coach_id" value="<?php echo $coach_object->getId();  ?>"/>
                    <input type="text" name="coach" value="<?php echo $coach->getName();  ?>" placeholder="<?php echo $coach->getName();  ?>" required="required" style="width: 40%;" />
                </td>
            </tr>
            <tr class="row-level">
                <th scope="row">
                    <label for="coach"><?php _e( 'Email', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="hidden" name="coach_id" value="<?php echo $coach_object->getId();  ?>"/>
                    <input type="text" name="email" value="<?php echo $coach->getMail();  ?>" placeholder="<?php echo $coach->getMail();  ?>" required="required" style="width: 40%;" />
                </td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'coach-aanpassen' ); ?>
        <?php submit_button( __( 'Aanpassen', 'Backend IVS' ), 'primary', 'submit_coach_aanpassen' ); ?>

    </form>
</div>
