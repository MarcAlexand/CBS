<?php
/**
 * @author: Marc de Boer<marcdeboer@zeelandnet.nl>
 * @since: 1-12-2016
 */

// This version must be the same as the one in the cbs.php
define('CBS_VERSION', '0.0.1');

// Minimum required Wordpress version for this plugin.
define('CBS_REQUIRED_WP_VERSION', '4.5');

// Defines the plugin basename in wordpress
define('CBS_PLUGIN_BASENAME', plugin_basename(CBS_PLUGIN));

// Defines the plugin name
define('CBS_PLUGIN_NAME', trim(dirname(CBS_PLUGIN_BASENAME), '/'));

// Folder Structure
define('CBS_PLUGIN_DIR', untrailingslashit(dirname(CBS_PLUGIN)));
define('CBS_APP_DIR', CBS_PLUGIN_DIR.'/app/');
define('CBS_ADMIN_DIR', CBS_APP_DIR.'admin/');
define('CBS_CONTROLLER_DIR', CBS_ADMIN_DIR.'controller/');
define('CBS_ENCRYPTION_DIR', CBS_ADMIN_DIR.'encryption/');
define('CBS_DAO_DIR', CBS_MODEL_DIR.'dao/');
define('CBS_VIEW_DIR', CBS_ADMIN_DIR.'view/');
define('CBS_FILES_DIR', CBS_PLUGIN_DIR.'/files/');

define('CBS_SRC_DIR', CBS_PLUGIN_DIR.'/src/');
define('CBS_JS_DIR', CBS_SRC_DIR.'js/');

