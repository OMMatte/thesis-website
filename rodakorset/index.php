<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include(PATH_FULL_PHP . "head.php");
    ?>
</head>
<body id="body_rodakorset">
<?php
include(PATH_FULL_PHP . "body_top.php");
?>

<div class="container" id="top_container">
    <!-- Example row of columns -->
    <div class="row" id="image_row_1"></div>
    <br>
    <div class="row" id="image_row_2"></div>
    <?php
    include(PATH_FULL_PHP . "footer.php");
    ?>
</div>
<?php
include(PATH_FULL_PHP . "body_bottom.php");
?>

<script>
    elevutveckling.generateHeader("rodakorset", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    var id = '#image_row_1';

    $(id).append(elevutveckling.generateSubjectImageButtons("mathematics", "/matematik"));

    $(id).append(elevutveckling.generateSubjectImageButtons("physics", "/physics"));

    $(id).append(elevutveckling.generateSubjectImageButtons("chemistry", "/chemistry"));

    var id2 = '#image_row_2';

    $(id2).append(elevutveckling.generateSubjectImageButtons("rodakorset", "http://www.redcross.se/"));

    $(id2).append(elevutveckling.generateSubjectImageButtons("human_rights", "http://www.manskligarattigheter.se/"));

    $(id2).append(elevutveckling.generateSubjectImageButtons("freedom_of_speech", "http://www.riksdagen.se/sv/Sa-funkar-riksdagen/Demokrati/Grundlagarna/Yttrandefrihetsgrundlag/"));
</script>
</body>
</html>