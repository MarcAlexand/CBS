<?php

$ratingType = new \CBS\Controller\ratingTypeController();
$form_validator_object = new \CBS\Controller\FormValidator();

if (isset($_POST['submit_nieuwe_beoordelingstype']) && !empty($_POST['submit_nieuwe_beoordelingstype'])) {
    // Validate the input data from the form
    $ratingType_form_data = $form_validator_object->ratingTypeCreateFormValidator();
    // Call the function Create and sends the $form_data with it
    $ratingType->setNameRatingType($_POST['naam']);
    $ratingType->create();
    echo '<script>location.href="?page=CBS_admin_beoordelingstype_lijst";</script>';
}

?>

<div class="wrap">
    <h1><?php _e( 'Nieuwe Beoordelingstype', 'Coach Beoordeling Systeem' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-naam">
                    <th scope="row">
                        <label for="naam"><?php _e( 'Beoordelingstype', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="naam" id="beoordelingstype" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'coach-nieuw' ); ?>
        <?php submit_button( __( 'Toevoegen', 'Backend IVS' ), 'primary', 'submit_nieuwe_beoordelingstype' ); ?>

    </form>
</div>
