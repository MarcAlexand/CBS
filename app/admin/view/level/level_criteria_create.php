<?php

$leveltype = new \CBS\Controller\levelCriteriaController();

$ExternLevel = $leveltype->getLevelDataList();

if (isset($_POST['submit_level_nieuwe']) && !empty($_POST['submit_level_nieuwe'])) {
    // Call the function Create and sends the $form_data with it
    $result = $_POST['level_info'];
    $result_explode = explode('|', $result);
    echo "Level: ". $result_explode[0]."<br />";
    echo "Omschrijving: ". $result_explode[1]."<br />";
    $leveltype->setFkLevel($result_explode[0]);
    $leveltype->setOmschrijving($result_explode[1]);
    $leveltype->setTotaalAantalOpdracht($_POST['totaal_opdracht']);
    $leveltype->setVerplichtOpdrachtAantal($_POST['type_opdracht_aantal']);
    $leveltype->setTechnischOpdrachtAantal($_POST['categorie_opdracht_aantal']);
    $leveltype->create();
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
                    <label for="coach"><?php _e( 'Level omschrijving', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <select id="leerling_level" name="level_info">
                        <?php
                        foreach($ExternLevel as $level_object){
                            ?>
                            <option value="<?= $level_object->getId(); ?>|<?= $level_object->getDescription(); ?>"><?= $level_object->getNumber()." ".$level_object->getDescription(); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr class="row-klas">
                <th scope="row">
                    <label for="coach"><?php _e( 'Totaal aantal opdrachten', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="text" name="totaal_opdracht"  required="required" style="width: 40%;" />
                </td>
            </tr>
            <tr class="row-klas">
                <th scope="row">
                    <label for="coach"><?php _e( 'Totaal aantal verplichte opdrachte', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="text" name="type_opdracht_aantal" value="" placeholder="" required="required" style="width: 40%;" />
                </td>
            </tr>
            <tr class="row-klas">
                <th scope="row">
                    <label for="coach"><?php _e( 'Totaal aantal technische opdrachten', 'Backend IVS' ); ?></label>
                </th>
                <td>
                    <input type="text" name="categorie_opdracht_aantal" value="" required="required" style="width: 40%;" />
                </td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'submit_level_nieuwe' ); ?>
        <?php submit_button( __( 'Toevoegen', 'Backend IVS' ), 'primary', 'submit_level_nieuwe' ); ?>

    </form>
</div>

