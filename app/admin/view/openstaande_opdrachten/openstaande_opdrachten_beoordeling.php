<?php
$gemaakteOpdrachten = new \CBS\gemaakteOpdrachtenController\gemaakteOpdrachtenController();
$beoordelingstype_object = new \CBS\Controller\ratingTypeController();
$beoordeling = new \CBS\Controller\ratingController();

//haal gegevens van huidige gebruiker op
global $current_user;
//huidige gebruikers id
$coach_id = $current_user->ID;
//Naam van huidige gebruiker
//$coach_name = $current_user->user_firstname ." ". $current_user->user_lastname;
//Koppel id van opdracht en leerling
$opdracht_leerling_id = $_GET['made_task'];

// haal opdracht naam op op basis van opdracht id
$opdracht = $gemaakteOpdrachten->getGemaakteOpdrachtLeerlingByOpdrachtleerlingId($opdracht_leerling_id);
// haal naam uit foreach
foreach($opdracht as $titleopdracht){
    $opdracht_titel = $titleopdracht->opdrachtNaam;
    $opdracht_omschrijving = $titleopdracht->getOpdrachtBeschrijving();
}
// haal lijst van beoordelingstype op
$beoordelingstype_object_list = $beoordelingstype_object->getRatingTypeList();
// beoordeling op slaan
if (isset($_POST['submit_nieuwe_beoordeling']) && !empty($_POST['submit_nieuwe_beoordeling'])) {
    // Validate the input data from the form
    // Call the function Create and sends the $form_data with it
    $beoordeling->setIdRatingType($_POST['grade']);
    $beoordeling->setIdCoach($_POST['coachid']);
    $beoordeling->setIdStudentTask($_POST['opdracht_leerling_id']);
    $beoordeling->setNoteRating($_POST['opmerking']);
    $beoordeling->create();
    echo '<script>location.href="?page=CBS_admin_openstaande_opdrachten";</script>';
}

?>


<div class="wrap">
    <h1 class="wp-heading-inline">Opdracht beoordelen</h1>
    <hr>
    <form method="post">
    <table class="form-table">
        <tbody>
            <tr>
                <th>
                    <?php echo $opdracht_titel." - ".$opdracht_omschrijving; ?>
                    <input type="hidden" name="coachid" value="<?php echo $coach_id; ?>">
                    <input type="hidden" name="opdracht_leerling_id" value="<?php echo $opdracht_leerling_id; ?>">
                </th>
                <td>
                    <div class="radio">
                        <?php foreach($beoordelingstype_object_list as $beoordelings_object){ ?>
                        <input id="<?php echo $beoordelings_object->getNameRatingType(); ?>" type="radio" name="grade" value="<?php echo $beoordelings_object->getIdRatingType(); ?>" required> 
                        <label for="<?php echo $beoordelings_object->getNameRatingType(); ?>"><?php echo $beoordelings_object->getNameRatingType(); ?></label>
                        <?php } ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <textarea rows="4" cols="100" placeholder="Opmerking" name="opmerking"></textarea>
    <?php submit_button( __( 'Save', 'Coach Beoordeling Systeem' ), 'primary', 'submit_nieuwe_beoordeling' ); ?>
    </form>
</div>