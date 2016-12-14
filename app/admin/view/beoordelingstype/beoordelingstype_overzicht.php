<?php
/**
 * @author: Marc de Boer <marcdeboer@zeelandnet.nl>
 * @since: 13-10-2016
 */
$coach = new \PMS\Controller\CoachController();
$course_object = new \PMS\Controller\CourseController();
$coach_list = $coach->getList();

// Set default value
$current_page = 'PMS_admin_coach_lijst';
$create = 'admin.php?page=PMS_admin_coach_lijst&action=create';
$urlcreate = admin_url($create);

?>
<div class="wrap">
    <h1>Coach lijst <a href="<?php echo $urlcreate; ?>" class="page-title-action">Nieuwe Coach</a></h1>


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
                    <a href="http://weitjerock:8888/pms/wp-admin/edit.php?orderby=title&amp;order=asc">
                        <span>Coach</span>
                        <span class="sorting-indicator">
				            </span>
                    </a>
                </th>
                <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                    <a href="http://weitjerock:8888/pms/wp-admin/edit.php?orderby=title&amp;order=asc">
                        <span>Email</span>
                        <span class="sorting-indicator">
				            </span>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody id="the-list">
            <?php
            if(isset($coach_list)){
                foreach ($coach_list as $coach) { ?>

                    <tr id="post-1"
                        class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-geen-categorie">
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                            <strong>

                                <?= $coach->getName(); ?>

                            </strong>
                            <div class="locked-info">
                                <span class="locked-avatar"></span>
                                <span class="locked-text"></span>
                            </div>
                            <div class="row-actions">
		                    <span class="edit">
		                    	<?php
                                $edit = 'admin.php?page=PMS_admin_coach_lijst&action=edit&id=' . $coach->getId();
                                $urlcreate = admin_url($create);
                                $urledit = admin_url($edit); ?>
                                <a class="row-title" href="<?php echo $urledit; ?>">
                                    Bewerken
                                </a> |
			                </span>
                                <span class="trash">
                                        <?php
                                        $current_page = 'PMS_admin_coach_lijst';
                                        $delete = 'admin.php?page=PMS_admin_coach_lijst&action=delete&id=' . $coach->getId();
                                        $urldelete = admin_url($delete);
                                        ?>
                                    <a href="<?php echo $urldelete; ?>">Verwijderen</a>
                            </span>
                            </div>
                        <td class="tags column-tags" data-colname="Tags">
                            <?= $coach->getMail(); ?>
                        </td>
                        </td>
                    </tr>
                    <?php
                }
            } else { ?>
            <tr id="post-1"
                class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-geen-categorie">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Titel">
                    Geen Coach ingevoerd
                </td>
                <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                    <a href="http://weitjerock:8888/pms/wp-admin/edit.php?orderby=title&amp;order=asc">
                        <span>Coach</span>
                        <span class="sorting-indicator">
				            </span>
                    </a>
                </th>
                <th scope="col" id="" class="manage-column column-title column-primary sortable desc">
                    <a href="http://weitjerock:8888/pms/wp-admin/edit.php?orderby=title&amp;order=asc">
                        <span>Email</span>
                        <span class="sorting-indicator">
				            </span>
                    </a>
                </th>
            </tr>
            </tfoot>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Level 1</option>
                    <option value="edit" class="hide-if-no-js">Level 2</option>
                    <option value="trash">Level 3</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Uitvoeren">
            </div>
            <div class="alignleft actions">
            </div>
            <div class="tablenav-pages one-page">
                <span class="displaying-num">1 item</span>
                <span class="pagination-links">
					<span class="tablenav-pages-navspan" aria-hidden="true">«</span>
					<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
					<span class="screen-reader-text">Huidige pagina</span>
					<span id="table-paging" class="paging-input">1 van
						<span class="total-pages">1</span>
					</span>
					<span class="tablenav-pages-navspan" aria-hidden="true">›</span>
					<span class="tablenav-pages-navspan" aria-hidden="true">»</span>
				</span>
            </div>
            <br class="clear">
        </div>

    </form>
    <div id="ajax-response"></div>
    <br class="clear">
</div>
