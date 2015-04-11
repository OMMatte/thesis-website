<html lang="en">
<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include("$root/dist/php/head.php");
    ?>
</head>
<body>
<?php
include("$root/dist/php/body_top.php");
?>

<div class="container">
    <div class="row" id="image_row_1">

    </div>

    <?php
    include("$root/dist/php/footer.php");
    ?>
</div>
<?php
include("$root/dist/php/body_bottom.php");
?>

<script>
    printHeaderHelper("home");

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
</script>

</body>
</html>