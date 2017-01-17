<?php
$gemaakteOpdrachten = new \CBS\Controller\gemaakteOpdrachtenController();
$beoordelingstype_object = new \CBS\Controller\ratingTypeController();
$beoordeling_object = new \CBS\Controller\ratingController();
$form_validator_object = new \CBS\Controller\FormValidator();


//haal gegevens van huidige gebruiker op
global $current_user;
//huidige gebruikers id
$coach_id = $current_user->ID;
//Naam van huidige gebruiker
//$coach_name = $current_user->user_firstname ." ". $current_user->user_lastname;
//Koppel id van opdracht en leerling
$opdracht_leerling_id = $_GET['made_task'];
$ratedTask = $beoordeling_object->getRatedTaskListByTaskId($opdracht_leerling_id);
foreach ($ratedTask as $ratedData){
    $ratedId = $ratedData->getIdRating();
}

// haal opdracht naam op op basis van opdracht id
$opdracht = $gemaakteOpdrachten->getGemaakteOpdrachtLeerlingByOpdrachtleerlingId($opdracht_leerling_id);
// haal naam uit foreach
foreach($opdracht as $titleopdracht){
    $opdracht_titel = $titleopdracht->opdrachtNaam;
    $opdracht_id = $titleopdracht->getIdOpdracht();
    $student_id = $titleopdracht->getIdStudent();
    $opdracht_omschrijving = $titleopdracht->getOpdrachtBeschrijving();
    $student_naam = $titleopdracht->getStudentVoornaam() ." ". $titleopdracht->getStudentTussenvoegsel() ." ". $titleopdracht->getStudentAchternaam();
}
// haal lijst van beoordelingstype op
$beoordelingstype_object_list = $beoordelingstype_object->getRatingTypeList();
$beoordeling_object_lijst = $beoordeling_object->getRatedTaskListByStudentAndTaskId($student_id, $opdracht_id);
// beoordeling op slaan
if (isset($_POST['submit_update_beoordeling']) && !empty($_POST['submit_update_beoordeling'])) {
    $beoordeling_form_data = $form_validator_object->ratingEditFormValidator();
    $beoordeling_object->update($beoordeling_form_data);
    echo '<script>location.href="?page=CBS_admin_alle_opdrachten";</script>';
}

?>


<class="wrap">
    <h1 class="wp-heading-inline">Opdracht beoordelen voor <?= $student_naam; ?></h1>
    <hr>
    <?php if(empty($beoordeling_object_lijst)){?>
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
                            <?php foreach($beoordelingstype_object_list as $beoordelingstype_object){ ?>
                                <input id="<?php echo $beoordelingstype_object->getNameRatingType(); ?>" type="radio" name="grade" value="<?php echo $beoordelingstype_object->getIdRatingType(); ?>" required> 
                                <label for="<?php echo $beoordelingstype_object->getNameRatingType(); ?>"><?php echo $beoordelingstype_object->getNameRatingType(); ?></label>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <textarea rows="4" cols="100" placeholder="Opmerking" name="opmerking"></textarea>
            <?php submit_button( __( 'Save', 'Coach Beoordeling Systeem' ), 'primary', 'submit_nieuwe_beoordeling' ); ?>
        </form>
    <?php
    } else {
        foreach($beoordeling_object_lijst as $beoordeling_object){?>
            <form method="post">
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th>
                            <?php echo $opdracht_titel . " - " . $opdracht_omschrijving; ?>
                            <input type="hidden" name="coachid" value="<?php echo $coach_id; ?>">
                            <input type="hidden" name="opdracht_leerling_id" value="<?php echo $opdracht_leerling_id; ?>">
                            <input type="hidden" name="beoordeling_id" value="<?php echo $ratedId; ?>">
                        </th>
                        <td>
                            <div class="radio">
                                <?php foreach ($beoordelingstype_object_list as $beoordelingstype_object) {
                                        if ($beoordeling_object->getIdRatingType() == $beoordelingstype_object->getIdRatingType()){?>
                                            <input id="<?php echo $beoordelingstype_object->getNameRatingType(); ?>" type="radio"
                                               name="grade" value="<?php echo $beoordelingstype_object->getIdRatingType(); ?>"
                                               required checked> 
                                            <label for="<?php echo $beoordelingstype_object->getNameRatingType(); ?>"><?php echo $beoordelingstype_object->getNameRatingType(); ?></label>
                                <?php   } else { ?>
                                <input id="<?php echo $beoordelingstype_object->getNameRatingType(); ?>" type="radio"
                                               name="grade" value="<?php echo $beoordelingstype_object->getIdRatingType(); ?>"
                                               required> 
                                            <label for="<?php echo $beoordelingstype_object->getNameRatingType(); ?>"><?php echo $beoordelingstype_object->getNameRatingType(); ?></label>
                                      <?php  }
                                } ?>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <textarea rows="4" cols="100" placeholder="<?php echo $beoordeling_object->getNoteRating(); ?>" name="opmerking"></textarea>
                <?php submit_button(__('Bewerken', 'Coach Beoordeling Systeem'), 'primary', 'submit_update_beoordeling'); ?>
            </form><?php
        }

        } ?>

</div>