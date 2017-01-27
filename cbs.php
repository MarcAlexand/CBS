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

include_once plugin_dir_path( __FILE__).'app/admin/Controller/AuthKeyController.php';
include_once plugin_dir_path( __FILE__).'app/admin/Encryption/AES.php';

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

function validate_authorization_key($key){
    if(!isset($key)){
        // No key found return bad request
        header("HTTP/1.1 400 Bad Request");
        exit;
    }
    // Validate key
    $auth_key_object = new \CBS\Controller\AuthKeyController();
    $validKey = $auth_key_object->getAuthKeyByKey($key);
    if(!isset($validKey)) return false;
    return true;
}


function get_rated_tasks_abroad() {
    $headers = apache_request_headers();
    $authorizationKey = $headers['Authorization'];
    $isValidkey = validate_authorization_key($authorizationKey);

    if(!$isValidkey){
        // Invalid key return 401 unauthorzied
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }
    $task_info = get_rated_tasks();
    if(empty($task_info)){
        return null;
    }
    $task_info = serialize($task_info);
    $blockSize = 256;
    $aes = new \CBS\Encryption\AES($task_info, $authorizationKey, $blockSize);
    $enc = $aes->encrypt();
    $aes->setData($enc);

    return $enc;
}
function get_rated_task_by_student_id_abroad($data) {
    $headers = apache_request_headers();
    $authorizationKey = $headers['Authorization'];
    $isValidkey = validate_authorization_key($authorizationKey);

    if(!$isValidkey){
        // Invalid key return 401 unauthorzied
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }
    $data = array('id'=>$data['id']);
    $task_info = get_rated_task_by_student_id($data);
    if(empty($task_info)){
        return null;
    }
    $task_info = serialize($task_info);
    $blockSize = 256;
    $aes = new \CBS\Encryption\AES($task_info, $authorizationKey, $blockSize);
    $enc = $aes->encrypt();
    $aes->setData($enc);

    return $enc;
}

function get_rated_task_by_task_id_abroad($data) {
    $headers = apache_request_headers();
    $authorizationKey = $headers['Authorization'];
    $isValidkey = validate_authorization_key($authorizationKey);

    if(!$isValidkey){
        // Invalid key return 401 unauthorzied
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }
    $data = array('id'=>$data['id']);
    $task_info = get_rated_task_by_task_id($data);
    if(empty($task_info)){
        return null;
    }
    $task_info = serialize($task_info);
    $blockSize = 256;
    $aes = new \CBS\Encryption\AES($task_info, $authorizationKey, $blockSize);
    $enc = $aes->encrypt();
    $aes->setData($enc);

    return $enc;
}
function get_rated_task_by_rate_id_abroad($data) {
    $headers = apache_request_headers();
    $authorizationKey = $headers['Authorization'];
    $isValidkey = validate_authorization_key($authorizationKey);

    if(!$isValidkey){
        // Invalid key return 401 unauthorzied
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }
    $data = array('id'=>$data['id']);
    $task_info = get_rated_task_by_rate_id($data);
    if(empty($task_info)){
        return null;
    }
    $task_info = serialize($task_info);
    $blockSize = 256;
    $aes = new \CBS\Encryption\AES($task_info, $authorizationKey, $blockSize);
    $enc = $aes->encrypt();
    $aes->setData($enc);

    return $enc;
}

// SQL Query
function get_rated_tasks(){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
          INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
          INNER JOIN '.$wpdb->prefix.'ivs_beoordelings_type ON '.$wpdb->prefix.'ivs_beoordelings_type.id_beoordelings_type ='.$wpdb->prefix.'ivs_beoordeling.fk_beoordeling_type', OBJECT );
    return $results;
}
function get_rated_task_by_student_id($data){

    global $wpdb;
    $results = $wpdb->get_results(
        'SELECT * from '.$wpdb->prefix.'ivs_beoordeling 
        INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID='.$wpdb->prefix.'ivs_beoordeling.fk_coach
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
            'callback' => 'get_rated_tasks_abroad',
        )
    );
} );
add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_task_by_student_id/(?P<id>\d+)/',
        array(
            'methods' => \WP_REST_Server::READABLE,
            'callback' => 'get_rated_task_by_student_id_abroad',
        )
    );
} );
add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_task_by_task_id/(?P<id>\d+)/',
        array(
            'methods' => 'GET',
            'callback' => 'get_rated_task_by_task_id_abroad',
        )
    );
} );
add_action( 'rest_api_init', function () {
    register_rest_route( 'cbs/v2', '/get_rated_task_by_rate_id/(?P<id>\d+)/',
        array(
            'methods' => \WP_REST_Server::READABLE,
            'callback' => 'get_rated_task_by_rate_id_abroad',
        )
    );
} );



