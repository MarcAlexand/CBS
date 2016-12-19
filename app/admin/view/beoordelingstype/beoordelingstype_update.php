<?php

$beoordelingstype = new \CBS\Controller\ratingTypeController();
$form_validator_object = new \CBS\Controller\FormValidator();

$id = $_GET['id'];

$beoordelingstype_object = $beoordelingstype->getRatingTypeById($id);

if (isset($_POST['submit_beoordelingstype_aanpassen']) && !empty($_POST['submit_beoordelingstype_aanpassen'])) {
    // Validate the input data from the form
    $beoordelingstype_form_data = $form_validator_object->ratingTypeEditFormValidator();
    $beoordelingstype->update($beoordelingstype_form_data);
    echo '<script>location.href="?page=CBS_admin_beoordelingstype_lijst";</script>';
}
?>

<div class="wrap">
    <h1><?php _e( 'Beoordelingstype aanpassen', 'IVS Highscore' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Beoordelingstype', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="id_beoordeling_type" value="<?php echo $beoordelingstype_object->getIdRatingType();  ?>"/>
                        <input type="text" name="naam" value="<?php echo $beoordelingstype_object->getNameRatingType();  ?>" placeholder="<?php echo $beoordelingstype_object->getNameRatingType();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'beoordelingstype-aanpassen' ); ?>
        <?php submit_button( __( 'Aanpassen', 'Backend IVS' ), 'primary', 'submit_beoordelingstype_aanpassen' ); ?>

    </form>
</div>
