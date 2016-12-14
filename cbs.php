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

