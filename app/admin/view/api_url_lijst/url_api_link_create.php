<?php

$api_url_link = new \CBS\Controller\LinkController();
$form_validator_object = new \CBS\Controller\FormValidator();

if (isset($_POST['submit_api_url_link']) && !empty($_POST['submit_api_url_link'])) {
    // Validate the input data from the form
    $api_form_data = $form_validator_object->apiCreateFormValidator();

    // Call the function Create and sends the $form_data with it
    $api_url_link->setName($_POST['api_link_naam']);
    $api_url_link->setUrl($_POST['api_link_url']);
    $api_url_link->setAuthKey($_POST['api_link_sleutel']);
    $api_url_link->create();
    echo '<script>location.href="?page=CBS_admin_url_api_link_lijst";</script>';
}

?>

<div class="wrap">
    <h1><?php _e( 'Nieuwe Beoordelingstype', 'Coach Beoordeling Systeem' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-naam">
                    <th scope="row">
                        <label for="api_link_naam"><?php _e( 'Naam', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="api_link_naam" id="beoordelingstype" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-naam">
                    <th scope="row">
                        <label for="api_link_url"><?php _e( 'URL', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        Http(s)://<input type="text" name="api_link_url" id="beoordelingstype" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-naam">
                    <th scope="row">
                        <label for="api_link_sleutel"><?php _e( 'Authenticatie Sleutel', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="api_link_sleutel" id="beoordelingstype" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'api_url_link-nieuw' ); ?>
        <?php submit_button( __( 'Toevoegen', 'CBS' ), 'primary', 'submit_api_url_link' ); ?>

    </form>
</div>
