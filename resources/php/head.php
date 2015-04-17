<?php
$root_path = $_SERVER['DOCUMENT_ROOT'];
$files_dir = "/resources/";
$framework_files_dir = "/dist/";

$php_path = $files_dir . "php/";
$full_php_path = $root_path . $php_path;

$css_path = $files_dir . "css/";
$js_path = $files_dir . "js/";
$json_path = $files_dir . "json/";
$image_path = $files_dir . "images/";

$framework_css_path = $framework_files_dir . "css/";
$framework_js_path = $framework_files_dir . "js/";
$framework_font_path = $framework_files_dir . "fonts/";
?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Elevutveckling</title>



    <!-- Framework Files -->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $framework_css_path ?>bootstrap.min.css" rel="stylesheet">

    <!-- iHover style CSS. For hover over image effects -->
    <link href="<?php echo $framework_css_path ?>ihover.css" rel="stylesheet">


    <!-- Regular Files -->

    <!-- Main CSS -->
    <link href="<?php echo $css_path ?>main.css" rel="stylesheet">

    <!-- Custom styles for this bootstrap template -->
    <link href="<?php echo $css_path ?>jumbotron.css" rel="stylesheet">

    <link href="<?php echo $css_path ?>thumbnail.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<?php
echo '<script>';
echo 'var elevutvecklingPaths = {';
echo 'images: "' . $image_path . '",';
echo 'json: "' . $json_path . '"';
echo '};';
echo '</script>';
?>