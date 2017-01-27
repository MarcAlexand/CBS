<?php

$auth_sleutel = new \CBS\Controller\AuthKeyController();
$form_validator_object = new \CBS\Controller\FormValidator();

$id = $_GET['id'];

$auth_sleutel_object = $auth_sleutel->getAuthKeyById($id);

if (isset($_POST['submit_api_link_url_aanpassen']) && !empty($_POST['submit_api_link_url_aanpassen'])) {
    // Validate the input data from the form
    $auth_sleutel_form_data = $form_validator_object->authSleutelEditFormValidator();
    $auth_sleutel->update($auth_sleutel_form_data);
    echo '<script>location.href="?page=CBS_admin_url_authSleutel_lijst";</script>';
}
?>
<script>
    function randomPassword() {
        chars = "abcdefghijklmnopqrs!.?:;[]{}tuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        pass = "";
        for(x=0;x<32;x++){
            i = Math.floor(Math.random() * 62);
            pass += chars.charAt(i);
        }
        return pass;
    }
    function formSubmit(){
        passform.auth_sleutel_code.value = randomPassword(passform.length.value);
        return false;
    }

</script>

<div class="wrap">
    <h1><?php _e( 'Authentiecatie Sleutel aanpassen', 'Coach Beoordeling Systeem' ); ?></h1>

    <form method="post" name="passform">

        <table class="form-table">
            <tbody>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Naam', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="id_auth_sleutel" value="<?php echo $auth_sleutel_object->getId();  ?>"/>
                        <input type="text" name="auth_sleutel_naam" value="<?php echo $auth_sleutel_object->getName();  ?>" placeholder="<?php echo $auth_sleutel_object->getName();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Systeem afkorting', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="auth_sleutel_systeem_afkorting" value="<?php echo $auth_sleutel_object->getShortName();  ?>" placeholder="<?php echo $auth_sleutel_object->getShortName();  ?>" required="required" style="width: 40%;" />
                    </td>
                </tr>
                <tr class="row-klas">
                    <th scope="row">
                        <label for="coach"><?php _e( 'Authenticatie Sleutel', 'Coach Beoordeling Systeem' ); ?></label>
                    </th>
                    <td>
                        <input name="auth_sleutel_code" type="text" size="50" placeholder="<?php echo $auth_sleutel_object->getAuthKey(); ?>" value="<?php echo $auth_sleutel_object->getAuthKey(); ?>" tabindex="1">
                        <input type="button" value="Genereer Sleutel" onClick="javascript:formSubmit()" tabindex="2">&nbsp;<input type="reset" value="Verwijder" tabindex="3">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'api_link_url-aanpassen' ); ?>
        <?php submit_button( __( 'Wijzigen', 'Backend IVS' ), 'primary', 'submit_api_link_url_aanpassen' ); ?>

    </form>
</div>
