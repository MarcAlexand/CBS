<?php
$coach = new \PMS\Controller\CoachController();
$training = new \PMS\Controller\TrainingController();
$form_validator_object = new \PMS\Model\FormValidator();

$coach_object_list = $coach->getList();

if (isset($_POST['submit_nieuwe_coach']) && !empty($_POST['submit_nieuwe_coach'])) {
    // Validate the input data from the form
    $coach_form_data = $form_validator_object->coachCreateFormValidator();
    // Call the function Create and sends the $form_data with it
    $coach->createForm($coach_form_data);
    echo '<script>location.href="?page=PMS_admin_coach_lijst";</script>';


//    echo '<script>location.href="";</script>';
//    exit;
}

?>

<div class="wrap">
    <h1><?php _e( 'Nieuwe Coach', 'IVS Highscore' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
            <tr class="row-coach">
                <th scope="row">
                    <label for="coach"><?php _e( 'Coach', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="text" name="coach" id="coach" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                </td>
            </tr>

            <tr class="row-email">
                <th scope="row">
                    <label for="email"><?php _e( 'Email', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="text" name="email" id="email" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                </td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'coach-nieuw' ); ?>
        <?php submit_button( __( 'Toevoegen', 'Backend IVS' ), 'primary', 'submit_nieuwe_coach' ); ?>

    </form>
</div>
