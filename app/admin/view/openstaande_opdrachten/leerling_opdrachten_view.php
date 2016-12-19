<?php

$current_page = 'CBS_admin_openstaande_opdrachten';
$gemaakteOpdrachten = new \CBS\gemaakteOpdrachtenController\gemaakteOpdrachtenController();
$beoordeeelde_opdrachten = new \CBS\Controller\ratingController();

$student_id = $_GET['id'];
$student_info = $gemaakteOpdrachten->getGemaakteOpdrachtenByStudentId($student_id);
$beoordeeelde_object_list = $beoordeeelde_opdrachten->getRatedTaskList();
foreach($student_info as $studentnaam){
       $naam =  $studentnaam->getStudentVoornaam() ." ". $studentnaam->getStudentTussenvoegsel() ." ". $studentnaam->getStudentAchternaam();
}
foreach($beoordeeelde_object_list as $beoordeelde_object){
    $opdracht_id = $beoordeelde_object->getIdTask();
}

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
                    <span>Opdracht nummer</span>
                </td>
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
            if(isset($student_info)){
                foreach ($student_info as $student) {
                    if(!$student->getIdOpdracht() == $opdracht_id){ ?>
                        <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                            <input id="cb-select-2" type="hidden" value="<?php echo $student->getIdOpdracht(); ?>">
                            <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                                <strong>
                                    <?php
                                    $edit = 'admin.php?page=CBS_admin_openstaande_opdrachten&action=rate&idstudent='.$student->getIdStudent().'&idopdracht='.$student->getIdOpdracht();
                                    $urledit = admin_url($edit); ?>
                                    <a class="row-title" href="<?php echo $urledit; ?>">
                                        <?php echo $student->getIdOpdracht(). $student->getIdStudent(); ?>
                                    </a>
                                </strong>
                            </td>
                            <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                                <strong>
                                    <?php
                                    $edit = 'admin.php?page=CBS_admin_openstaande_opdrachten&action=rate&idstudent='.$student->getIdStudent().'&idopdracht='.$student->getIdOpdracht();
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
                    <span>Leerlingnummer</span>
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Naam</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>