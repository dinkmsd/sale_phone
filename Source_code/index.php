<?php

/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */
//trả về url của index và gán vào APPPATH 
$app_path = dirname(__FILE__);
define('APPPATH', $app_path);
/*
 * --------------------------------------------------------------------
 * core path // Chứa url của thư mục core
 * --------------------------------------------------------------------
 */
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);

/*
 * --------------------------------------------------------------------
 * modules path //Chứa url của thư mục modules
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder);


/*
 * --------------------------------------------------------------------
 * helper path //Chứa url của thư mục helper
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);


/*
 * --------------------------------------------------------------------
 * library path //Chứa url của thư mục libraries
 * --------------------------------------------------------------------
 */
$lib_folder= 'libraries';
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder);


/*
 * --------------------------------------------------------------------
 * layout path //Chứa url của thư mục layout
 * --------------------------------------------------------------------
 */
$layout_folder= 'layout';
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder);

/*
 * --------------------------------------------------------------------
 * config path //Chứa url của thư mục config
 * --------------------------------------------------------------------
 */
$config_folder= 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);

require COREPATH.DIRECTORY_SEPARATOR.'appload.php';
//DIRECTORY_SEPARATOR biến đổi / khi bị lỗi 
