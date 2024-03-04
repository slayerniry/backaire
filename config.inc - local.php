<?php


define('RP_MAIN_CONF', $_SERVER["DOCUMENT_ROOT"] . "/backaire/");

die(RP_MAIN_CONF);

define("CHAMP", "CC");

require_once(RP_MAIN_CONF . "include/constant.php");
require_once(RP_MAIN_CONF . "classes/nombre_en_lettre.php");
require_once(RP_MAIN_CONF . "classes/debug.php");
require_once(RP_MAIN_CONF . "classes/datetime.lib.php");
require_once(RP_MAIN_CONF . "classes/base.php");
require(RP_MAIN_CONF . "vendor/autoload.php");

require_once(RP_MAIN_CONF . "classes/XLSXReader.php");

date_default_timezone_set('Africa/Nairobi');


@ini_alter('error_log', RP_MAIN . 'log/error.log');
@ini_alter('display_errors', 1);

@ini_alter('max_execution_time', '-1');
@ini_alter('max_input_time', '1024');
@ini_alter('opcache.enable', '1');
@ini_alter('opcache.enable_file_override', '1');
@ini_alter('opcache.memory_consumption', '1024');

@ini_alter('memory_limit', '1024M');
@ini_alter('upload_max_filesize', '5M');

@ini_alter('output_buffering', '14096');
@ini_alter('default_charset', 'iso-8859-1');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$sql_details = array(
	'user' => $_ENV['DB_USER'],
	'pass' => $_ENV['DB_PWD'],
	'db'   => $_ENV['DB_NAME'],
	'host' => $_ENV['DB_HOST']
);

error_reporting(1);
