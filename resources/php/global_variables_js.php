<?php
echo '<script>';
echo 'extendNamespace(function(elevutveckling) {';
echo 'var paths = {';
echo 'images: "' . $image_path . '",';
echo 'json: "' . $json_path . '"';
echo '};';
echo 'elevutveckling.paths = paths;';
echo '});';
echo '</script>';