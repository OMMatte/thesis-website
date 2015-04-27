<?php
$root_path = $_SERVER['DOCUMENT_ROOT'];
$files_dir = "/resources/";
$framework_files_dir = "/dist/";

$php_path = $files_dir . "php/";
$css_path = $files_dir . "css/";
$js_path = $files_dir . "js/";
$json_path = $files_dir . "json/";
$image_path = $files_dir . "images/";
$qa_path = "qa/";
$qa_shared_path = $qa_path . "shared-files";

$full_php_path = $root_path . $php_path;
$full_qa_path = $root_path . $qa_path;

$framework_css_path = $framework_files_dir . "css/";
$framework_js_path = $framework_files_dir . "js/";
$framework_font_path = $framework_files_dir . "fonts/";

$subjects = array
(
    'math' => array('mathematics', 'matematik'),
    'phys' => array('physics', "fysik"),
    'chem' => array('chemistry', "kemi")
);

$query_string_qa_conf = "conf_filename";