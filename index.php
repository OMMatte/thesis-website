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
    <div class="row" id="image_row_1">

    </div>

    <?php
    include("$root$php_path/footer.php");
    ?>
</div>
<?php
include("$root$php_path/body_bottom.php");
?>

<script>
    generateHeaderHelper("home", function (html) {
       $('#top_container').before(html);
    });
</script>

<script>
    var id = '#image_row_1';

    genereateIHoverImageHelper("mathematics", function (htmlMath) {
        $(id).append(htmlMath);
    }, "/matematik");

    genereateIHoverImageHelper("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    }, "/fysik");

    genereateIHoverImageHelper("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    }, "/kemi");
</script>

</body>
</html>