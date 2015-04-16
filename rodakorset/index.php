<html lang="en">
<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $php_path = "/resources/php";
    include("$root$php_path/head.php");
    ?>
</head>
<body>
<?php
include("$root$php_path/body_top.php");
?>

<div class="container" id="top_container">
    <!-- Example row of columns -->
    <div class="row" id="image_row_1"></div>
    <div class="row" , id="image_row_2"></div>
    <?php
    include("$root$php_path/footer.php");
    ?>
</div>
<?php
include("$root$php_path/body_bottom.php");
?>

<script>
    generateHeaderHelper("rodakorset", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    var id = '#image_row_1';

    genereateIHoverImageHelper("mathematics", function (htmlMath) {
        $(id).append(htmlMath);
    });

    genereateIHoverImageHelper("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    });

    genereateIHoverImageHelper("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    });

    var id2 = '#image_row_2';

    genereateIHoverImageHelper("rodakorset", function (htmlMath) {
        $(id2).append(htmlMath);
    });

    genereateIHoverImageHelper("human_rights", function (htmlPhysics) {
        $(id2).append(htmlPhysics);
    });

    genereateIHoverImageHelper("freedom_of_speech", function (htmlChemistry) {
        $(id2).append(htmlChemistry);
    });
</script>
</body>
</html>