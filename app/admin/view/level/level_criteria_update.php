<?php

$leveltype = new \CBS\Controller\levelCriteriaController();
$form_validator_object = new \CBS\Controller\FormValidator();

$id = $_GET['id'];

$leveltype_object = $leveltype->getLevelById($id);

if (isset($_POST['submit_level_aanpassen']) && !empty($_POST['submit_level_aanpassen'])) {
    // Validate the input data from the form
    $level_form_data = $form_validator_object->levelEditFormValidator();
    $leveltype->update($level_form_data);
    echo '<script>location.href="?page=CBS_admin_level_lijst";</script>';
}
?>

<div class="wrap">
    <h1><?php _e( 'Level aanpassen', 'IVS Highscore' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Level Criteria', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="id_level_criteria" value="<?php echo $leveltype_object->getIdLevelCriteria();  ?>"/>
                        <input type="text" readonly value="<?php echo $leveltype_object->getFkLevel()." ".$leveltype_object->getOmschrijving();  ?>" placeholder="<?php echo $leveltype_object->getFkLevel()." ".$leveltype_object->getOmschrijving();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Totaal aantal opdrachten', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="totaal_opdracht" value="<?php echo $leveltype_object->getTotaalAantalOpdracht();  ?>" placeholder="<?php echo $leveltype_object->getTotaalAantalOpdracht();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Totaal aantal verplichte opdrachte', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="type_opdracht_aantal" value="<?php echo $leveltype_object->getVerplichtOpdrachtAantal();  ?>" placeholder="<?php echo $leveltype_object->getVerplichtOpdrachtAantal();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Totaal aantal technische opdrachten', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="categorie_opdracht_aantal" value="<?php echo $leveltype_object->getTechnischOpdrachtAantal();  ?>" placeholder="<?php echo $leveltype_object->getTechnischOpdrachtAantal();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'submit_level_aanpassen' ); ?>
        <?php submit_button( __( 'Aanpassen', 'Backend IVS' ), 'primary', 'submit_level_aanpassen' ); ?>

    </form>
</div>
