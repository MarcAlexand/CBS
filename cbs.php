<?php
/**
 * Plugin Name: Coach Beoordeling Systeem
 * Description: With this plugin you can upload a group excell sheet to the database
 * Author: Marc de Boer
 * Version: 0.0.1
 * Text Domain: www.bb2media.nl
 * Domain Path: languages
 *
 * This is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with your plugin. If not, see <http://www.gnu.org/licenses/>.
 */

// Define the plugin name:
define ( 'CBS_PLUGIN', __FILE__ );

// Require the config file and autoload
include_once plugin_dir_path( __FILE__).'app/config.php';
include_once CBS_PLUGIN_DIR.'/vendor/autoload.php';

class CBS{

    public function __construct()
    {
        do_action('CBS_pre_init');
        add_action('init', array($this, 'init'), 1);
    }

    public function init()
    {
        do_action('CBS_init');

        if(is_admin()){
            $this->requireAdmin();
            $this->createAdmin();
        }
    }

    public function requireAdmin()
    {
        include_once CBS_ADMIN_DIR.'CBSAdminController.php';
    }

    public function createAdmin()
    {
        CBSAdminController::prepare();
    }

}

$cbs = new CBS();

function get_rated_tasks_aboard() {
    $students = get_rated_tasks();
    if(empty($students)){
        return null;
    }
    return $students;
}


function get_rated_task_by_student_id_abroad($data) {
    $students = get_rated_task_by_student_id($data);
    if(empty($students)){
        return null;
    }
    return $students;
}

function get_rated_task_by_task_id_abroad($data) {
    $students = get_rated_task_by_task_id($data);
    if(empty($students)){
        return null;
    }
    return $students;
}


function get_rated_task_by_rate_id_abroad($data) {
    $students = get_rated_task_by_rate_id($data);
    if(empty($students)){
        return null;
    }
    return $students;
}


function get_rated_tasks(){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
          INNER JOIN wp_users ON wp_users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
          INNER JOIN '.$wpdb->prefix.'ivs_beoordelings_type ON '.$wpdb->prefix.'ivs_beoordelings_type.id_beoordelings_type ='.$wpdb->prefix.'ivs_beoordeling.fk_beoordeling_type', OBJECT );

    return $results;
}

function get_rated_tasks_by_task(){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
          INNER JOIN '.$wpdb->prefix.'users ON wp_users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
          INNER JOIN '.$wpdb->prefix.'ivs_beoordelings_type ON '.$wpdb->prefix.'ivs_beoordelings_type.id_beoordelings_type ='.$wpdb->prefix.'ivs_beoordeling.fk_beoordeling_type', OBJECT );

    return $results;
}

function get_rated_task_by_student_id($data){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
        INNER JOIN '.$wpdb->prefix.'users ON wp_users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
WHERE '.$wpdb->prefix.'ivs_beoordeling.fk_leerling ='.$data['id'].'', OBJECT );

    return $results;
}

function get_rated_task_by_task_id($data){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
  INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
WHERE '.$wpdb->prefix.'ivs_beoordeling.fk_opdracht ='.$data['id'].'', OBJECT );

    return $results;
}

function get_rated_task_by_rate_id($data){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
  INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
  INNER JOIN '.$wpdb->prefix.'ivs_beoordelings_type ON '.$wpdb->prefix.'ivs_beoordelings_type.id_beoordelings_type='.$wpdb->prefix.'ivs_beoordeling.fk_beoordeling_type
WHERE '.$wpdb->prefix.'ivs_beoordeling.id_beoordeling ='.$data['id'].'', OBJECT );

    return $results;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_tasks/',
        array(
            'methods' => 'GET',
            'callback' => 'get_rated_tasks',
        )
    );
} );

add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_task_by_student_id/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_rated_task_by_student_id',
        )
    );
} );

add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_task_by_task_id/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_rated_task_by_task_id',
        )
    );
} );

add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_task_by_rate_id/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_rated_task_by_rate_id',
        )
    );
} );



