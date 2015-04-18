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
    }, "/matematik");

    elevutveckling.genereateIHoverImageHelper("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    }, "/physics");

    elevutveckling.genereateIHoverImageHelper("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    }, "/chemistry");

    var id2 = '#image_row_2';

    elevutveckling.genereateIHoverImageHelper("stadsmissionen", function (html) {
        $(id2).append(html);
    }, "http://www.stadsmissionen.se/");

    elevutveckling.genereateIHoverImageHelper("human_rights", function (html) {
        $(id2).append(html);
    }, "http://www.manskligarattigheter.se/");

    elevutveckling.genereateIHoverImageHelper("freedom_of_speech", function (html) {
        $(id2).append(html);
    }, "http://www.riksdagen.se/sv/Sa-funkar-riksdagen/Demokrati/Grundlagarna/Yttrandefrihetsgrundlag/");
</script>

</body>
</html>