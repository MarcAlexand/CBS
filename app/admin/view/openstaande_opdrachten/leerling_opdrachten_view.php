<?php

$current_page = 'CBS_admin_openstaande_opdrachten';
$gemaakteOpdrachten = new \CBS\gemaakteOpdrachtenController\gemaakteOpdrachtenController();

$opdrachten_lijst = $gemaakteOpdrachten->getGemaakteOpdrachten();
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
            </a>
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
                    <label class="screen-reader-text" for="cb-select-all-1">Alles selecteren</label>
                    <input id="cb-select-all-1" type="checkbox">
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
                        <th scope="row" class="check-column">
                            <input id="cb-select-2" type="checkbox" name="post[]" value="2">
                        </th>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
                                <a class="row-title" href="http://weitjerock:8888/cbs/wp-admin/post.php?post=2&amp;action=edit" aria-label="“Voorbeeld pagina” (bewerken)">
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
                    <th scope="row" class="check-column">
                        <input id="cb-select-2" type="checkbox" name="post[]" value="2">
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
                    <label class="screen-reader-text" for="cb-select-all-1">Alles selecteren</label>
                    <input id="cb-select-all-1" type="checkbox">
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
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Opdrachtt type</span>
                </td>
                <td scope="col" id="date" class="manage-column column-date sortable asc">
                    <span>Opdracht categorie</span>
                </td>
            </tr>
            </tfoot>

        </table>
        <div class="tablenav bottom">

            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Bulkactie selecteren</label><select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Acties</option>
                    <option value="edit" class="hide-if-no-js">Bewerken</option>
                    <option value="trash">In de prullenbak</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Uitvoeren">
            </div>
            <div class="alignleft actions">
            </div>
            <div class="tablenav-pages one-page"><span class="displaying-num">1 item</span>
                <span class="pagination-links"><span class="tablenav-pages-navspan" aria-hidden="true">«</span>
<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
<span class="screen-reader-text">Huidige pagina</span><span id="table-paging" class="paging-input"><span class="tablenav-paging-text">1 van <span class="total-pages">1</span></span></span>
<span class="tablenav-pages-navspan" aria-hidden="true">›</span>
<span class="tablenav-pages-navspan" aria-hidden="true">»</span></span></div>
            <br class="clear">
        </div>

    </form>


    <form method="get"><table style="display: none"><tbody id="inlineedit">

            <tr id="inline-edit" class="inline-edit-row inline-edit-row-page inline-edit-page quick-edit-row quick-edit-row-page inline-edit-page" style="display: none"><td colspan="5" class="colspanchange">

                    <fieldset class="inline-edit-col-left">
                        <legend class="inline-edit-legend">Snel bewerken</legend>
                        <div class="inline-edit-col">

                            <label>
                                <span class="title">Titel</span>
                                <span class="input-text-wrap"><input type="text" name="post_title" class="ptitle" value=""></span>
                            </label>

                            <label>
                                <span class="title">Slug</span>
                                <span class="input-text-wrap"><input type="text" name="post_name" value=""></span>
                            </label>


                            <fieldset class="inline-edit-date">
                                <legend><span class="title">Datum</span></legend>
                                <div class="timestamp-wrap"><label><span class="screen-reader-text">Maand</span><select name="mm">
                                            <option value="01" data-text="Jan">01-Jan</option>
                                            <option value="02" data-text="Feb">02-Feb</option>
                                            <option value="03" data-text="Mrt">03-Mrt</option>
                                            <option value="04" data-text="Apr">04-Apr</option>
                                            <option value="05" data-text="Mei">05-Mei</option>
                                            <option value="06" data-text="Jun">06-Jun</option>
                                            <option value="07" data-text="Jul">07-Jul</option>
                                            <option value="08" data-text="Aug">08-Aug</option>
                                            <option value="09" data-text="Sep">09-Sep</option>
                                            <option value="10" data-text="Okt">10-Okt</option>
                                            <option value="11" data-text="Nov">11-Nov</option>
                                            <option value="12" data-text="Dec" selected="selected">12-Dec</option>
                                        </select></label> <label><span class="screen-reader-text">Dag</span><input type="text" name="jj" value="05" size="2" maxlength="2" autocomplete="off"></label>, <label><span class="screen-reader-text">Jaar</span><input type="text" name="aa" value="2016" size="4" maxlength="4" autocomplete="off"></label> @ <label><span class="screen-reader-text">Uur</span><input type="text" name="hh" value="11" size="2" maxlength="2" autocomplete="off"></label>:<label><span class="screen-reader-text">Minuut</span><input type="text" name="mn" value="40" size="2" maxlength="2" autocomplete="off"></label></div><input type="hidden" id="ss" name="ss" value="51">			</fieldset>
                            <br class="clear">

                            <label class="inline-edit-author"><span class="title">Auteur</span><select name="post_author" class="authors">
                                    <option value="1">Tabron (Tabron)</option>
                                </select></label>
                            <div class="inline-edit-group wp-clearfix">
                                <label class="alignleft">
                                    <span class="title">Wachtwoord</span>
                                    <span class="input-text-wrap"><input type="text" name="post_password" class="inline-edit-password-input" value=""></span>
                                </label>

                                <em class="alignleft inline-edit-or">
                                    – OF –				</em>
                                <label class="alignleft inline-edit-private">
                                    <input type="checkbox" name="keep_private" value="private">
                                    <span class="checkbox-title">Privé</span>
                                </label>
                            </div>


                        </div></fieldset>


                    <fieldset class="inline-edit-col-right"><div class="inline-edit-col">

                            <label>
                                <span class="title">Hoofd</span>
                                <select name="post_parent" id="post_parent">
                                    <option value="0">Hoofdpagina (geen sub)</option>
                                    <option class="level-0" value="2">Voorbeeld pagina</option>
                                </select>
                            </label>


                            <label>
                                <span class="title">Volgorde</span>
                                <span class="input-text-wrap"><input type="text" name="menu_order" class="inline-edit-menu-order-input" value="0"></span>
                            </label>





                            <div class="inline-edit-group wp-clearfix">
                                <label class="alignleft">
                                    <input type="checkbox" name="comment_status" value="open">
                                    <span class="checkbox-title">Reacties toestaan</span>
                                </label>
                            </div>


                            <div class="inline-edit-group wp-clearfix">
                                <label class="inline-edit-status alignleft">
                                    <span class="title">Status</span>
                                    <select name="_status">
                                        <option value="publish">Gepubliceerd</option>
                                        <option value="future">Gepland</option>
                                        <option value="pending">Wachtend op review</option>
                                        <option value="draft">Concept</option>
                                    </select>
                                </label>


                            </div>


                        </div></fieldset>

                    <p class="submit inline-edit-save">
                        <button type="button" class="button cancel alignleft">Annuleren</button>
                        <input type="hidden" id="_inline_edit" name="_inline_edit" value="62e870b965">				<button type="button" class="button button-primary save alignright">Bijwerken</button>
                        <span class="spinner"></span>
                        <input type="hidden" name="post_view" value="list">
                        <input type="hidden" name="screen" value="edit-page">
                        <span class="error" style="display:none"></span>
                        <br class="clear">
                    </p>
                </td></tr>

            <tr id="bulk-edit" class="inline-edit-row inline-edit-row-page inline-edit-page bulk-edit-row bulk-edit-row-page bulk-edit-page" style="display: none"><td colspan="5" class="colspanchange">

                    <fieldset class="inline-edit-col-left">
                        <legend class="inline-edit-legend">Bulkbewerken</legend>
                        <div class="inline-edit-col">
                            <div id="bulk-title-div">
                                <div id="bulk-titles"></div>
                            </div>




                        </div></fieldset>


                    <fieldset class="inline-edit-col-right"><div class="inline-edit-col">

                            <label class="inline-edit-author"><span class="title">Auteur</span><select name="post_author" class="authors">
                                    <option value="-1">— Geen wijzigingen —</option>
                                    <option value="1">Tabron (Tabron)</option>
                                </select></label>			<label>
                                <span class="title">Hoofd</span>
                                <select name="post_parent" id="post_parent">
                                    <option value="-1">— Geen wijzigingen —</option>
                                    <option value="0">Hoofdpagina (geen sub)</option>
                                    <option class="level-0" value="2">Voorbeeld pagina</option>
                                </select>
                            </label>





                            <div class="inline-edit-group wp-clearfix">
                                <label class="alignleft">
                                    <span class="title">Reacties</span>
                                    <select name="comment_status">
                                        <option value="">— Geen wijzigingen —</option>
                                        <option value="open">Toestaan</option>
                                        <option value="closed">Niet toestaan</option>
                                    </select>
                                </label>
                            </div>


                            <div class="inline-edit-group wp-clearfix">
                                <label class="inline-edit-status alignleft">
                                    <span class="title">Status</span>
                                    <select name="_status">
                                        <option value="-1">— Geen wijzigingen —</option>
                                        <option value="publish">Gepubliceerd</option>

                                        <option value="private">Privé</option>
                                        <option value="pending">Wachtend op review</option>
                                        <option value="draft">Concept</option>
                                    </select>
                                </label>


                            </div>


                        </div></fieldset>

                    <p class="submit inline-edit-save">
                        <button type="button" class="button cancel alignleft">Annuleren</button>
                        <input type="submit" name="bulk_edit" id="bulk_edit" class="button button-primary alignright" value="Bijwerken">			<input type="hidden" name="post_view" value="list">
                        <input type="hidden" name="screen" value="edit-page">
                        <span class="error" style="display:none"></span>
                        <br class="clear">
                    </p>
                </td></tr>
            </tbody></table></form>

    <div id="ajax-response"></div>
    <br class="clear">
</div>