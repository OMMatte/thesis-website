<?php
/**
 * PATH OR DIRECTORY CONSTANTS
 */
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');

define('PATH_RESOURCES', '/resources/');
define('PATH_PHP', PATH_RESOURCES . 'php/');
define('PATH_CSS', PATH_RESOURCES . 'css/');
define('PATH_JS', PATH_RESOURCES . 'js/');
define('PATH_JSON', PATH_RESOURCES . 'json/');
define('PATH_IMAGES', PATH_RESOURCES . 'images/');

define('PATH_FRAMEWORKS', '/dist/');
define('PATH_FRAMEWORKS_CSS', PATH_FRAMEWORKS . 'css/');
define('PATH_FRAMEWORK_JS', PATH_FRAMEWORKS . 'js/');
define('PATH_FRAMEWORK_FONT', PATH_FRAMEWORKS . 'fonts/');

define('PATH_QA', '/qa/');
define('PATH_QA_SHARED', PATH_QA . 'shared-files/');

define('PATH_SERVER', '/server/');

define('PATH_FULL_PHP', PATH_ROOT . PATH_PHP);
define('PATH_FULL_QA', PATH_ROOT . PATH_QA);
define('PATH_FULL_SERVER', PATH_ROOT . PATH_SERVER);


/**
 * DATABASE CONSTANTS
 */
define('MYSQL_HOSTNAME', '127.0.0.1');
define('MYSQL_USERNAME', 'awzctixl_ommatte');
define('MYSQL_PASSWORD', '123A654B789C');

if (strpos(gethostname(), 'misshosting') !== false) {
    define('MYSQL_DATABASE', 'awzctixl_elevutveckling');
} else {
    define('MYSQL_DATABASE', 'awzctixl_localhost');
}


/**
 * GENERAL CONSTANTS
 */
define('KEY_SUBJECT_MATH', 'math');
define('KEY_SUBJECT_PHYS', 'phys');
define('KEY_SUBJECT_CHEM', 'chem');

define ("SUBJECTS", serialize(array(
    KEY_SUBJECT_MATH => array('mathematics', 'matematik'),
    KEY_SUBJECT_PHYS => array('physics', 'fysik'),
    KEY_SUBJECT_CHEM => array('chemistry', 'kemi'))));