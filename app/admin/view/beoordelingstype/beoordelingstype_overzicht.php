<?php
/**
 * @author: Marc de Boer <marcdeboer@zeelandnet.nl>
 * @since: 13-10-2016
 */
$ratingType = new \CBS\Controller\ratingTypeController();

$ratingTypeList = $ratingType->getRatingTypeList();
// Set default value
$current_page = 'CBS_admin_beoordelingstype_lijst';
$create = 'admin.php?page=CBS_admin_beoordelingstype_lijst&action=create';
$urlcreate = admin_url($create);

?>
<div class="wrap">
    <h1>Beoordelingstype lijst <a href="<?php echo $urlcreate; ?>" class="page-title-action">Nieuwe Beoordelingstype</a></h1>


    <h2 class="screen-reader-text">Coach filteren</h2>
    <form id="posts-filter" method="get">
        <input type="hidden" name="post_status" class="post_status_page" value="all">
        <input type="hidden" name="post_type" class="post_type_page" value="post">

        <input type="hidden" id="_wpnonce" name="_wpnonce" value="4aa8201794">
        <input type="hidden" name="_wp_http_referer" value="/pms/wp-admin/edit.php">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                    <a href="#">
                        <span>Beoordelingstype</span>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody id="the-list">
            <?php
            if(isset($ratingTypeList)){
                foreach ($ratingTypeList as $ratingType) { ?>

                    <tr id="post-1"
                        class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-geen-categorie">
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>
                                <?= $ratingType->getNameRatingType(); ?>
                            </strong>
                            <div class="locked-info">
                                <span class="locked-avatar"></span>
                                <span class="locked-text"></span>
                            </div>
                            <div class="row-actions">
                                <span class="edit">
                                    <?php
                                    $edit = 'admin.php?page=CBS_admin_beoordelingstype_lijst&action=update&id=' .$ratingType->getIdRatingType();
                                    $urlcreate = admin_url($create);
                                    $urledit = admin_url($edit); ?>
                                    <a class="row-title" href="<?php echo $urledit; ?>">
                                        Bewerken
                                    </a> |
                                </span>
                                    <span class="trash">
                                            <?php
                                            $current_page = 'PMS_admin_coach_lijst';
                                            $delete = 'admin.php?page=CBS_admin_beoordelingstype_lijst&action=delete&id=' . $ratingType->getIdRatingType();
                                            $urldelete = admin_url($delete);
                                            ?>
                                        <a href="<?php echo $urldelete; ?>">Verwijderen</a>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else { ?>
            <tr id="post-1"
                class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-geen-categorie">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                    Geen Beoordelingstype gevonden
                </td>
                <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                    <a href="#">
                        <span>Beoordelingstype</span>

                    </a>
                </th>
            </tr>
            </tfoot>
        </table>

    </form>
    <div id="ajax-response"></div>
    <br class="clear">
</div>
