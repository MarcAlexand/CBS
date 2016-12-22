<?php
$gemaakteOpdrachten = new \CBS\Controller\gemaakteOpdrachtenController();
$beoordelingstype_object = new \CBS\Controller\ratingTypeController();
$beoordeling_object = new \CBS\Controller\ratingController();
$level_criteria_object = new \CBS\Controller\levelCriteriaController();


//haal gegevens van huidige gebruiker op
global $current_user;
//huidige gebruikers id
$coach_id = $current_user->ID;
//Naam van huidige gebruiker
//$coach_name = $current_user->user_firstname ." ". $current_user->user_lastname;
//Koppel id van opdracht en leerling
$opdracht_leerling_id = $_GET['opdracht_leerling_id'];
$student_id = $_GET['student_id'];

// haal opdracht naam op op basis van opdracht id
$opdracht = $gemaakteOpdrachten->getGemaakteOpdrachtLeerlingByOpdrachtleerlingId($opdracht_leerling_id);
$beoordeling_teller = $beoordeling_object->getRateCounterByStudentId($student_id);
$voldoende_teller = $beoordeling_object->getGoodRatedGradesByGradeId($student_id);
// haal naam uit foreach
foreach($opdracht as $titleopdracht){
    $opdracht_titel = $titleopdracht->opdrachtNaam;
    $opdracht_omschrijving = $titleopdracht->getOpdrachtBeschrijving();
    $student_naam = $titleopdracht->getStudentVoornaam() ." ". $titleopdracht->getStudentTussenvoegsel() ." ". $titleopdracht->getStudentAchternaam();
    $student_level = $titleopdracht->getStudentLevel() ." : ". $titleopdracht->getStudentLevelBeschrijving();
    $level = $titleopdracht->getStudentLevel();
}
$level_criteria_object_lijst = $level_criteria_object->getHoeveelhedenByIdLevel($level);
foreach ($level_criteria_object_lijst as $level_criteria){
    $totaal_opdracht = $level_criteria->getTotaalAantalOpdracht();
    $voldoende_opdracht = $level_criteria->getVerplichtOpdrachtAantal();

}


?>


<div class="wrap">
    <h1 class="wp-heading-inline">SLB - <?php echo $student_naam; ?> overzicht</h1>
    <hr>
    <table class="wp-list-table widefat fixed striped pages" style="background-color: #ffffff;">
        <tbody>
            <tr>
                <td>
                    Leerling
                </td>
                <td>
                    <?php echo $student_naam; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Leerlingnummer
                </td>
                <td>
                    <?php echo $student_id; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Level
                </td>
                <td>
                    <?php echo $student_level; ?>
                </td>
            </tr>
        </tbody>
    </table><br />
    <table class="wp-list-table widefat fixed striped pages" style="background-color: #ffffff;">
        <tbody>
        <tr>
            <td>
                Totaal gemaakte opdrachten
            </td>
            <td>
                <progress max="<?php echo $totaal_opdracht ?>" value="<?php echo $beoordeling_teller->getTotal(); ?>">
                    <div class="progress-bar">
                        <span style="width: 80%;">Progress: 80%</span>
                    </div>
                </progress>
                <?php echo $beoordeling_teller->getTotal()." / ".$totaal_opdracht ?>
            </td>
        </tr>
        <tr>
            <td>
                Aantal verplicht voldoendes
            </td>
            <td>
                <progress max="<?php echo $voldoende_opdracht ?>" value="<?php echo $voldoende_teller->getGrade(); ?>">
                    <div class="progress-bar">
                        <span style="width: 80%;">Progress: 80%</span>
                    </div>
                </progress>
                <?php echo $voldoende_teller->getGrade() ." / ".$voldoende_opdracht; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>