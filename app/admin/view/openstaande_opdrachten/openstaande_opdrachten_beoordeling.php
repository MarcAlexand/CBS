<?php

$current_page = 'CBS_admin_openstaande_opdrachten';
$gemaakteOpdrachten = new \CBS\gemaakteOpdrachtenController\gemaakteOpdrachtenController();

$opdracht_id = $_GET['idopdracht'];
$student_id = $_GET['idstudent'];

?>


<div class="wrap">
    <h1 class="wp-heading-inline">Opdracht beoordelen</h1>
    <hr>
    <table class="form-table">
        <tbody>
            <tr>
                <th>
                    Opdracht titel
                </th>
                <td>
                    <div class="radio">
                        <input id="goed" type="radio" name="grade" value="1"> 
                        <label for="goed">Goed</label>
                        <input id="voldoende" type="radio" name="grade" value="2">
                        <label for="voldoende">Voldoende</label>
                        <input id="onvoldoende" type="radio" name="grade" value="3">
                        <label for="onvoldoende">Ovnoldoende</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <textarea rows="4" cols="100" placeholder="Opmerking"></textarea>
    <?php wp_nonce_field( 'beoordeling' ); ?>
    <?php submit_button( __( 'Save', 'Coach Beoordeling Systeem' ), 'primary', 'submit_nieuwe_beoordeling' ); ?>
</div>