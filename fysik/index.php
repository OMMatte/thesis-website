<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/constants.php");
    include(PATH_FULL_PHP . "head.php");
    ?>
</head>
<body id="body_physics">
<?php
include(PATH_FULL_PHP . "navigator.php");
?>

<div id="header_placement"></div>

<div class="container" id="top_container">

    <div id="opened_room_placement"></div>

    <div id="content_placement"></div>

    <?php
    include(PATH_FULL_PHP . "footer.php");
    ?>
</div>
<?php
include(PATH_FULL_PHP . "body_bottom.php");
?>

<script>
    $('#header_placement').append(elevutveckling.generateHeader(elevutveckling.subjects.phys.eng));
    $("#content_placement").append(elevutveckling.generateSubjectContent(elevutveckling.subjects.phys));
</script>
</body>
</html>