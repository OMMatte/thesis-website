<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include($full_php_path . "head.php");
    ?>
</head>

<body id="body_home">
<?php
include($full_php_path . "body_top.php");
?>

<div class="container" id="top_container">
    <div class="row" id="image_row_1">

    </div>

    <?php
    include($full_php_path . "footer.php");
    ?>
</div>
<?php
include($full_php_path . "body_bottom.php");
?>

<script>
    elevutveckling.generateHeaderHelper("home", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>

    var id = '#image_row_1';

    elevutveckling.genereateIHoverImageHelper("mathematics", function (htmlMath) {
        $(id).append(htmlMath);
    }, "/matematik");

    elevutveckling.genereateIHoverImageHelper("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    }, "/fysik");

    elevutveckling.genereateIHoverImageHelper("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    }, "/kemi");
</script>

</body>
</html>