<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include($full_php_path . "head.php");
    ?>
</head>
<body>
<?php
include($full_php_path . "body_top.php");
?>

<div class="container" id="top_container">
    <!-- Example row of columns -->
    <div class="row" id="image_row_1"></div>
    <div class="row" id="image_row_2"></div>
    <?php
    include($full_php_path . "footer.php");
    ?>
</div>
<?php
include($full_php_path . "body_bottom.php");
include($full_php_path . "global_variables_js.php");
?>

<script>
    elevutveckling.generateHeaderHelper("stadsmissionen", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    var id = '#image_row_1';

    elevutveckling.genereateIHoverImageHelper("mathematics", function (htmlMath) {
        $(id).append(htmlMath);
    });

    elevutveckling.genereateIHoverImageHelper("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    });

    elevutveckling.genereateIHoverImageHelper("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    });

    var id2 = '#image_row_2';

    elevutveckling.genereateIHoverImageHelper("stadsmissionen", function (htmlMath) {
        $(id2).append(htmlMath);
    });

    elevutveckling.genereateIHoverImageHelper("human_rights", function (htmlPhysics) {
        $(id2).append(htmlPhysics);
    });

    elevutveckling.genereateIHoverImageHelper("freedom_of_speech", function (htmlChemistry) {
        $(id2).append(htmlChemistry);
    });
</script>

</body>
</html>