<?php

$current_page = 'CBS_admin_openstaande_opdrachten';
$gemaakteOpdrachten = new \CBS\gemaakteOpdrachtenController\gemaakteOpdrachtenController();

$opdrachten_lijst = $gemaakteOpdrachten->getGemaakteOpdrachtenByOpdrachten();

?>


<div class="wrap">
    <h1 class="wp-heading-inline">Openstaande opdrachten</h1>
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
        <div class="alignleft actions bulkactions">

        </div>
        <div class="alignleft actions bulkactions">

        </div>
        <div class="alignleft actions bulkactions">

        </div>
        <table class="wp-list-table widefat fixed striped pages">
            <thead>
            <tr>
<!--                <td id="cb" class="manage-column column-cb check-column">-->
<!--                    <label class="screen-reader-text" for="cb-select-all-1">Alles selecteren</label>-->
<!--                    <input id="cb-select-all-1" type="checkbox">-->
<!--                </td>-->
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Opdracht</span>
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Omschrijving</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Opdrachtt type</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Opdracht categorie</span>
                </td>
            </tr>
            </thead>
            <tbody id="the-list"
            <?php
            if(isset($opdrachten_lijst)){
                foreach ($opdrachten_lijst as $opdracht) { ?>
                    <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                            <input id="cb-select-2" type="hidden" value="<?php echo $opdracht->getIdOpdracht(); ?>">
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
                                <?php
                                $edit = 'admin.php?page=CBS_admin_openstaande_opdrachten&action=task-student&id='.$opdracht->getIdOpdracht();
                                $urledit = admin_url($edit); ?>
                                <a class="row-title" href="<?php echo $urledit; ?>">
                                    <?php echo $opdracht->getOpdrachtNaam(); ?>
                                </a>
                            </strong>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo $opdracht->getOpdrachtBeschrijving(); ?>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo $opdracht->getOpdrachtInleverDatum(); ?>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo $opdracht->getOpdrachtType(); ?>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo $opdracht->getOpdrachtCategorie(); ?>
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
                        <span>Opdracht</span>
                    </td>
                    <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                        <span>Omschrijving</span>
                    </td>
                    <td scope="col" id="date" class="manage-column column-date sortable asc">
                        <span>Inleverdatum</span>
                    </td>
                    <td scope="col" id="date" class="manage-column column-date sortable asc">
                        <span>Opdrachtt type</span>
                    </td>
                    <td scope="col" id="date" class="manage-column column-date sortable asc">
                        <span>Opdracht categorie</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>