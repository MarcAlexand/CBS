<?php

$current_page = 'CBS_admin_openstaande_opdrachten';
$gemaakteOpdrachten = new \CBS\gemaakteOpdrachtenController\gemaakteOpdrachtenController();

$leerlingen_lijst = $gemaakteOpdrachten->getGemaakteOpdrachtenByLeerlingen();
?>


<div class="wrap">
    <h1 class="wp-heading-inline">Openstaande opdrachten</h1>
    <hr class="wp-header-end">
    <form id="posts-filter" method="get">
        <div class="alignleft actions bulkactions"><br /><br />
            <?php
            $opdracht = 'admin.php?page=CBS_admin_openstaande_opdrachten&action=task';
            $urlopdracht = admin_url($opdracht); ?>
            <a class="row-title" href="<?php echo $urlopdracht; ?>">
                Opdrachten Lijst
            </a><br /><br /><br />
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
                <td id="cb" class="manage-column column-cb check-column">
<!--                    <label class="screen-reader-text" for="cb-select-all-1">Alles selecteren</label>-->
<!--                    <input id="cb-select-all-1" type="checkbox">-->
                    Leerling nummer
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Leerling</span>
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Level</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
            </tr>
            </thead>
            <tbody id="the-list"
            <?php
            if(isset($leerlingen_lijst)){
                foreach ($leerlingen_lijst as $leerling) { ?>
                    <tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
                        <th scope="row" class="check-column">
<!--                            <input id="cb-select-2" type="checkbox" name="post[]" value="2">-->
                            <?php echo $leerling->getIdStudent(); ?>
                        </th>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
                                <a class="row-title" href="http://weitjerock:8888/cbs/wp-admin/post.php?post=2&amp;action=edit" aria-label="“Voorbeeld pagina” (bewerken)">
                                    <?php echo $leerling->getStudentVoornaam().' '. $leerling->getStudentTussenvoegsel().' '. $leerling->getStudentAchternaam() ; ?>
                                </a>
                            </strong>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo $leerling->getStudentLevel().' '.$leerling->getStudentLevelBeschrijving(); ?>
                        </td>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <?php echo $leerling->getOpdrachtInleverDatum(); ?>
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
                <td id="cb" class="manage-column column-cb check-column">
<!--                    <label class="screen-reader-text" for="cb-select-all-1">Alles selecteren</label>-->
<!--                    <input id="cb-select-all-1" type="checkbox">-->
                    Leerling nummer
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Opdracht</span>
                </td>
                <td scope="col" id="title" class="manage-column column-date column-primary sortable desc">
                    <span>Omschrijving</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Inleverdatum</span>
                </td>
            </tr>
            </tfoot>

        </table>

    </form>

</div>