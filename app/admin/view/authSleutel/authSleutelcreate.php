<?php

$auth_sleutel_object = new \CBS\Controller\AuthKeyController();
$form_validator_object = new \CBS\Controller\FormValidator();

if (isset($_POST['submit_auth_sleutel_nieuw']) && !empty($_POST['submit_auth_sleutel_nieuw'])) {
    // Validate the input data from the form
    $auth_form_data = $form_validator_object->authSleutelCreateFormValidator();

    // Call the function Create and sends the $form_data with it
    $auth_sleutel_object->setName($_POST['auth_sleutel_naam']);
    $auth_sleutel_object->setShortName($_POST['auth_sleutel_systeem_afkorting']);
    $auth_sleutel_object->setAuthKey($_POST['auth_sleutel_code']);
    $auth_sleutel_object->create();
    echo '<script>location.href="?page=CBS_admin_url_authSleutel_lijst";</script>';
}

?>
<script>
    function randomPassword() {
        chars = "abcdefghijklmnopqrs!@#$%^&*()_+=-{}[]:;'<,>.?/tuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        pass = "";
        for(x=0;x<12;x++){
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
    <h1><?php _e( 'Nieuwe Authenticatie Sleutel', 'Coach Beoordeling Systeem' ); ?></h1>

    <form method="post" name="passform">

        <table class="form-table">
            <tbody>
                <tr class="row-naam">
                    <th scope="row">
                        <label for="auth_sleutel_naam"><?php _e( 'Naam', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="auth_sleutel_naam" id="auth_sleutel_naam" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-systeem-afkorting">
                    <th scope="row">
                        <label for="auth_sleutel_systeem_afkorting"><?php _e( 'Systeem afkoring', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="auth_sleutel_systeem_afkorting" id="auth_sleutel_systeem_afkorting" class="regular-text" placeholder="<?php echo esc_attr( '', 'Backend IVS' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-naam">
                    <th scope="row">
                        <label for="auth_sleutel_code"><?php _e( 'Authenticatie Sleutel', 'Backend IVS' ); ?></label>
                    </th>
                    <td>
                        <input name="auth_sleutel_code" type="text" size="50" tabindex="1">
                        <input type="button" value="Genereer Sleutel" onClick="javascript:formSubmit()" tabindex="2">&nbsp;<input type="reset" value="Verwijder" tabindex="3">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="field_id" value="">

        <?php wp_nonce_field( 'auth_sleutel-nieuw' ); ?>
        <?php submit_button( __( 'Toevoegen', 'CBS' ), 'primary', 'submit_auth_sleutel_nieuw' ); ?>

    </form>
</div>
