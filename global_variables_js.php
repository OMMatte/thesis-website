<?php
echo '<script>';
echo 'extendNamespace(function(elevutveckling) {';

echo 'var paths = {';
echo 'images: "' . PATH_IMAGES . '",';
echo 'json: "' . PATH_JSON . '",';
echo 'qa: "' . PATH_QA . '",';
echo 'qaShared: "' . PATH_QA_SHARED . '",';
echo 'server: "' . PATH_SERVER . '"';
echo '};';

echo 'var subjects = {};';
echo 'subjects.math = {';
echo 'eng: "' . unserialize(SUBJECTS)["math"][0] . '",';
echo 'sv: "' . unserialize(SUBJECTS)["math"][1] . '"';
echo '};';

echo 'subjects.phys = {';
echo 'eng: "' . unserialize(SUBJECTS)["phys"][0] . '",';
echo 'sv: "' . unserialize(SUBJECTS)["phys"][1] . '"';
echo '};';

echo 'subjects.chem = {';
echo 'eng: "' . unserialize(SUBJECTS)["chem"][0] . '",';
echo 'sv: "' . unserialize(SUBJECTS)["chem"][1] . '"';
echo '};';

echo 'elevutveckling.subjects = subjects;';
echo 'elevutveckling.paths = paths;';

echo '});';
echo '</script>';
