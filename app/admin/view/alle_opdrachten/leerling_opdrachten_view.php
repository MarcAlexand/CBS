<?php

$current_page = 'CBS_admin_alle_opdrachten';
$gemaakteOpdrachten = new \CBS\Controller\gemaakteOpdrachtenController();

$student_id = $_GET['id'];
$niet_beoordeelde_lijst = $gemaakteOpdrachten->getGemaakteOpdrachtenByStudentId($student_id);

foreach($niet_beoordeelde_lijst as $studentnaam){
    $naam =  $studentnaam->getStudentVoornaam() ." ". $studentnaam->getStudentTussenvoegsel() ." ". $studentnaam->getStudentAchternaam();
}

?>


<div class="wrap">
    <h1 class="wp-heading-inline">Alle opdrachten van <?php echo $naam; ?> - Opdrachten overzicht</h1>
    <hr class="wp-header-end">
    <form id="posts-filter" method="get">
        <div class="alignleft actions bulkactions">
            <?php
            $student = 'admin.php?page=CBS_admin_alle_opdrachten&action=student';
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
            if(isset($niet_beoordeelde_lijst)){
                foreach ($niet_beoordeelde_lijst as $student) { ?>
                    <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                        <input id="cb-select-2" type="hidden" value="<?php echo $student->getIdOpdracht(); ?>">
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
                                <?php
                                $edit = 'admin.php?page=CBS_admin_alle_opdrachten&action=rate&made_task=' . $student->getIdOpdrachtenLeerlingen();
                                $urledit = admin_url($edit); ?>
                                <a class="row-title" href="<?php echo $urledit; ?>">
                                    <?php echo $student->getIdStudent(); ?>
                                </a>
                            </strong>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
                                <?php
                                $edit = 'admin.php?page=CBS_admin_alle_opdrachten&action=rate&made_task=' . $student->getIdOpdrachtenLeerlingen();
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