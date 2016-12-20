<?php

$current_page = 'CBS_admin_alle_opdrachten';
$gemaakteOpdrachten = new \CBS\Controller\gemaakteOpdrachtenController();
$beoordeelde_object = new \CBS\Controller\ratingController();

$beoordeelde_leerlingen_lijst_object = $beoordeelde_object->getRatedTaskList();
//var_dump($beoordeelde_leerlingen_lijst_object);
// get opdrachten en leerlingen op basis van FK uit beoordeelde leerlingen lijst
// *** Functie ****


?>


<div class="wrap">
    <h1 class="wp-heading-inline">SLB Overzicht</h1>
    <hr class="wp-header-end">
    <form id="posts-filter" method="get">
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
            <tr>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Leerling</span>
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Coach</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Beoordeling</span>
                </td>
            </tr>
            </thead>
            <tbody id="the-list"
            <?php
            if(isset($beoordeelde_leerlingen_lijst_object)){
                foreach ($beoordeelde_leerlingen_lijst_object as $leerling) { ?>
                    <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
<!--                                --><?php
//                                $edit = 'admin.php?page=CBS_admin_alle_opdrachten&action=student-task&id='.$leerling->getIdStudent();
//                                $urledit = admin_url($edit); ?>
<!--                                <a class="row-title" href="--><?php //echo $urledit; ?><!--">-->
<!--                                    --><?php //echo $leerling->getStudentVoornaam().' '. $leerling->getStudentTussenvoegsel().' '. $leerling->getStudentAchternaam() ; ?>
<!--                                </a>-->
                            </strong>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php
                                $user_info = get_userdata($leerling->getIdCoach());
                                echo $coach_name = $user_info->user_firstname ." ". $user_info->user_lastname;
                            ?>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php
                            $inleverDatum = $gemaakteOpdrachten->getGemaakteOpdrachtInleverDatumById($leerling->getIdStudentTask());
                            ?>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo "Cijfer"; ?>
                        </td>
                    </tr>
                    <?php
                }
            } else { ?>
                <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                    <th scope="row" class="check-column">
                        <!--                        <input id="cb-select-2" type="checkbox" name="post[]" value="2">-->
                    </th>
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
                    <span>Leerling</span>
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Coach</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Beoordeling</span>
                </td>
            </tr>
            </tfoot>

        </table>

    </form>

</div>