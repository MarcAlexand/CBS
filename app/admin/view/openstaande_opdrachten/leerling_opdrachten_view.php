<?php

$current_page = 'CBS_admin_openstaande_opdrachten';
$gemaakteOpdrachten = new \CBS\Controller\gemaakteOpdrachtenController();
$beoordeelde_object = new \CBS\Controller\ratingController();

$student_id = $_GET['id'];
$niet_beoordeelde_lijst = $gemaakteOpdrachten->getGemaakteOpdrachtenByStudentId($student_id);
$beoordeelde_object_lijst = $beoordeelde_object->getRatedTaskList();

foreach($niet_beoordeelde_lijst as $studentnaam){
       $naam =  $studentnaam->getStudentVoornaam() ." ". $studentnaam->getStudentTussenvoegsel() ." ". $studentnaam->getStudentAchternaam();
}
$filteredGemaakteOpdrachten = array_filter($niet_beoordeelde_lijst,
    function($gemaakteOpdrachten) use($beoordeelde_object_lijst){
        $heeftBeoordeling = false;
        if(isset($beoordeelde_object_lijst)){
            foreach($beoordeelde_object_lijst as $beoordeelde_object) {
                if($heeftBeoordeling) break;
                if($beoordeelde_object->getIdStudentTask() == $gemaakteOpdrachten->getIdOpdrachtenLeerlingen()) $heeftBeoordeling = true;
            }
        }
        return !$heeftBeoordeling;
    });

?>


<div class="wrap">
    <h1 class="wp-heading-inline">Openstaande opdrachten van <?php echo $naam; ?> - Opdrachten overzicht</h1>
    <hr class="wp-header-end">
    <form id="posts-filter" method="get">
        <div class="alignleft actions bulkactions">
            <?php
            $student = 'admin.php?page=CBS_admin_openstaande_opdrachten&action=student';
            $urlstudent = admin_url($student); ?>
            <a class="row-title" href="<?php echo $urlstudent; ?>">
                Studenten Lijst
            </a><br />
        </div>
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
            <tr>
                <!--                <td id="cb" class="manage-column column-cb check-column">-->
                <!--                    <label class="screen-reader-text" for="cb-select-all-1">Alles selecteren</label>-->
                <!--                    <input id="cb-select-all-1" type="checkbox">-->
                <!--                </td>-->
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Opdracht titel</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
            </tr>
            </thead>
            <tbody id="the-list">
            <?php
            if(isset($filteredGemaakteOpdrachten)){
                foreach ($filteredGemaakteOpdrachten as $student) { ?>
                        <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                            <input id="cb-select-2" type="hidden" value="<?php echo $student->getIdOpdracht(); ?>">
                            <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                                <strong>
                                    <?php
                                    $edit = 'admin.php?page=CBS_admin_openstaande_opdrachten&action=rate&made_task=' . $student->getIdOpdrachtenLeerlingen();
                                    $urledit = admin_url($edit); ?>
                                    <a class="row-title" href="<?php echo $urledit; ?>">
                                        <?php echo $student->getOpdrachtNaam() ; ?>
                                    </a>
                                </strong>
                            </td>
                            <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                                <?php echo $student->getOpdrachtInleverDatum(); ?>
                            </td>
                        </tr>
                        <?php
                    }
            } else { ?>
                <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                    <!--                    <th scope="row" class="check-column">-->
                    <!--                        <input id="cb-select-2" type="checkbox" name="post[]" value="2">-->
                    <!--                    </th>-->
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                        <strong>
                            Er zijn geen opdrachten die op beoordeling wachten
                        </strong>
                    </td>
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                        -
                    </td>
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                        -
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Opdracht titel</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>