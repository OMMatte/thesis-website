<?php
echo '<script>';
echo 'extendNamespace(function(elevutveckling) {';

echo 'var paths = {';
echo 'images: "' . $image_path . '",';
echo 'json: "' . $json_path . '",';
echo 'qa: "' . $qa_path . '",';
echo 'qaShared: "' . $qa_shared_path . '"';
echo '};';

echo 'var subjects = {};';
echo 'subjects.math = {';
echo 'eng: "' . $subjects["math"][0] . '",';
echo 'sv: "' . $subjects["math"][1] . '"';
echo '};';

echo 'subjects.phys = {';
echo 'eng: "' . $subjects["phys"][0] . '",';
echo 'sv: "' . $subjects["phys"][1] . '"';
echo '};';

echo 'subjects.chem = {';
echo 'eng: "' . $subjects["chem"][0] . '",';
echo 'sv: "' . $subjects["chem"][1] . '"';
echo '};';


echo 'var queryString = {';
echo 'qaConf: "' . $query_string_qa_conf . '"';
echo '};';


echo 'elevutveckling.subjects = subjects;';
echo 'elevutveckling.paths = paths;';
echo 'elevutveckling.queryString = queryString';

echo '});';
echo '</script>';
