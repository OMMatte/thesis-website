<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include(PATH_FULL_PHP . "head.php");
    ?>
</head>
<body id="body_stadsmissionen">
<?php
include(PATH_FULL_PHP . "body_top.php");
?>

<div class="container" id="top_container">
    <!-- Example row of columns -->
    <div class="row" id="image_row_1"></div>
    <div class="row" id="image_row_2"></div>
    <?php
    include(PATH_FULL_PHP . "footer.php");
    ?>
</div>
<?php
include(PATH_FULL_PHP . "body_bottom.php");
?>

<script>
    elevutveckling.generateHeader("stadsmissionen", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    var id = '#image_row_1';

    elevutveckling.generateSubjectImageButtons("mathematics", function (htmlMath) {
        $(id).append(htmlMath);
    }, "/matematik");

    elevutveckling.generateSubjectImageButtons("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    }, "/physics");

    elevutveckling.generateSubjectImageButtons("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    }, "/chemistry");

    var id2 = '#image_row_2';

    elevutveckling.generateSubjectImageButtons("stadsmissionen", function (html) {
        $(id2).append(html);
    }, "http://www.stadsmissionen.se/");

    elevutveckling.generateSubjectImageButtons("human_rights", function (html) {
        $(id2).append(html);
    }, "http://www.manskligarattigheter.se/");

    elevutveckling.generateSubjectImageButtons("freedom_of_speech", function (html) {
        $(id2).append(html);
    }, "http://www.riksdagen.se/sv/Sa-funkar-riksdagen/Demokrati/Grundlagarna/Yttrandefrihetsgrundlag/");
</script>

</body>
</html>