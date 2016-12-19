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
//opdracht id
$opdracht_id = $_GET['idopdracht'];
//student id
$student_id = $_GET['idstudent'];

// haal opdracht naam op op basis van opdracht id
$opdracht = $gemaakteOpdrachten->getGemaakteOpdrachtById($opdracht_id);
// haal naam uit foreach
foreach($opdracht as $titleopdracht){$nieuwevar = $titleopdracht->opdrachtNaam;}
// haal lijst van beoordelingstype op
$beoordelingstype_object_list = $beoordelingstype_object->getRatingTypeList();
// beoordeling op slaan
if (isset($_POST['submit_nieuwe_beoordeling']) && !empty($_POST['submit_nieuwe_beoordeling'])) {
    // Validate the input data from the form
    // Call the function Create and sends the $form_data with it
    $beoordeling->setIdRatingType($_POST['grade']);
    $beoordeling->setIdCoach($_POST['coachid']);
    $beoordeling->setIdStudent($_POST['studentid']);
    $beoordeling->setIdTask($_POST['opdrachtid']);
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
                    <?php echo $nieuwevar; ?>
                    <input type="hidden" name="coachid" value="<?php echo $coach_id; ?>">
                    <input type="hidden" name="studentid" value="<?php echo $student_id; ?>">
                    <input type="hidden" name="opdrachtid" value="<?php echo $opdracht_id; ?>">
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