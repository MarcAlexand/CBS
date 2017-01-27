<?php

$api_url_link = new \CBS\Controller\LinkController();
$form_validator_object = new \CBS\Controller\FormValidator();

$id = $_GET['id'];

$api_url_link_object = $api_url_link->getUrlLinkById($id);

if (isset($_POST['submit_api_link_url_aanpassen']) && !empty($_POST['submit_api_link_url_aanpassen'])) {
    // Validate the input data from the form
    $api_url_link_form_data = $form_validator_object->apiEditFormValidator();
    $api_url_link->update($api_url_link_form_data);
    echo '<script>location.href="?page=CBS_admin_url_api_link_lijst";</script>';
}
?>

<div class="wrap">
    <h1><?php _e( 'API URL Link aanpassen', 'Coach Beoordeling Systeem' ); ?></h1>

    <form method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Api Url Naam', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="id_api_link" value="<?php echo $api_url_link_object->getId();  ?>"/>
                        <input type="text" name="api_link_naam" value="<?php echo $api_url_link_object->getName();  ?>" placeholder="<?php echo $api_url_link_object->getName();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Shortcode', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="api_link_systeem_afkorting" value="<?php echo $api_url_link_object->getShortcode();  ?>" placeholder="<?php echo $api_url_link_object->getShortcode();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Api Url link', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        http(s)://<input type="text" name="api_link_url" value="<?php echo $api_url_link_object->getUrl();  ?>" placeholder="<?php echo $api_url_link_object->getUrl();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Authenticatie Sleutel', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="api_link_sleutel" value="<?php echo $api_url_link_object->getAuthKey();  ?>" placeholder="<?php echo $api_url_link_object->getAuthKey();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'api_link_url-aanpassen' ); ?>
        <?php submit_button( __( 'Wijzigen', 'Backend IVS' ), 'primary', 'submit_api_link_url_aanpassen' ); ?>

    </form>
</div>
