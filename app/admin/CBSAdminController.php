<?php
/**
 * Class CBSAdminController.php
 *
 * Class documentation
 *
 * @author: Marc de Boer <marcdeboer@zeelandnet.nl>
 * @since: 1/12/2016
 * @version 0.1 14/06/2016 Initial class definition.
 */




class CBSAdminController
{
    static function prepare(){
        if(is_admin()){
            add_action('admin_menu', array('CBSAdminController', 'addMenus'));
        }
    }

    static function addMenus(){
        add_menu_page(
            __('CBS Admin', 'CBS'),
            __('CBS', 'CBS'),
            'manage_options',
            'CBS-admin',
            array('CBSAdminController', 'adminMenuPage')
        );

        add_submenu_page(
            'CBS-admin',
            __('Openstaande opdrachten', 'CBS'),
            __('Openstaande opdrachten', 'CBS'),
            'manage_options',
            'CBS_admin_openstaande_opdrachten',
            array('CBSAdminController', 'openstaande_opdrachten')
        );

        add_submenu_page(
            'CBS-admin',
            __('Alle opdrachten', 'CBS'),
            __('Alle opdrachten', 'CBS'),
            'manage_options',
            'CBS_admin_alle_opdrachten',
            array('CBSAdminController', 'alle_opdrachten')
        );

        add_submenu_page(
            'CBS-admin',
            __('SLB Overzicht', 'CBS'),
            __('SLB Overzicht', 'CBS'),
            'manage_options',
            'CBS_admin_slb_overzicht',
            array('CBSAdminController', 'slb_overzicht')
        );

        add_submenu_page(
            'CBS-admin',
            __('Beoordelingstype Lijst', 'CBS'),
            __('Beoordelingstype Lijst', 'CBS'),
            'manage_options',
            'CBS_admin_beoordelingstype_lijst',
            array('CBSAdminController', 'beoordelingstype_lijst')
        );

    }

    public function openstaande_opdrachten() {
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ($action) {
            case 'student':
                $template = dirname( __FILE__ ) . '/view/openstaande_opdrachten/leerlingen_view.php';
                break;

            case 'task':
                $template = dirname( __FILE__ ) . '/view/openstaande_opdrachten/opdrachten_view.php';
                break;
            case 'student-task':
                $template = dirname( __FILE__ ) . '/view/openstaande_opdrachten/leerling_opdrachten_view.php';
                break;
            case 'task-student':
                $template = dirname( __FILE__ ) . '/view/openstaande_opdrachten/opdracht_leerlingen_view.php';
                break;
            case 'rate':
                $template = dirname( __FILE__ ) . '/view/openstaande_opdrachten/openstaande_opdrachten_beoordeling.php';
                break;

            default:
                $template = dirname( __FILE__ ) . '/view/openstaande_opdrachten/opdrachten_view.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }

    public function alle_opdrachten() {
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ($action) {
            case 'student':
                $template = dirname( __FILE__ ) . '/view/alle_opdrachten/leerlingen_view.php';
                break;

            case 'task':
                $template = dirname( __FILE__ ) . '/view/alle_opdrachten/opdrachten_view.php';
                break;
            case 'student-task':
                $template = dirname( __FILE__ ) . '/view/alle_opdrachten/leerling_opdrachten_view.php';
                break;
            case 'task-student':
                $template = dirname( __FILE__ ) . '/view/alle_opdrachten/opdracht_leerlingen_view.php';
                break;
            case 'rate':
                $template = dirname( __FILE__ ) . '/view/alle_opdrachten/alle_opdrachten_beoordeling.php';
                break;

            default:
                $template = dirname( __FILE__ ) . '/view/alle_opdrachten/opdrachten_view.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }

    public function slb_overzicht() {
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ($action) {
            case 'student':
                $template = dirname( __FILE__ ) . '/view/slb_overzicht/slb_leerling_overzicht.php';
                break;

            default:
                $template = dirname( __FILE__ ) . '/view/slb_overzicht/slb_leerlingen_overzicht.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }

    public function beoordelingstype_lijst(){
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ($action) {
            case 'create':
                $template = dirname( __FILE__ ) . '/view/beoordelingstype/beoordelingstype_create.php';
                break;
            case 'update':
                $template = dirname( __FILE__ ) . '/view/beoordelingstype/beoordelingstype_update.php';
                break;
            case 'delete':
                $template = dirname( __FILE__ ) . '/view/beoordelingstype/beoordelingstype_delete.php';
                break;

            default:
                $template = dirname( __FILE__ ) . '/view/beoordelingstype/beoordelingstype_overzicht.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }


    static function adminMenuPage(){

    }

}