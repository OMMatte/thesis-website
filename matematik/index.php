<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include(PATH_FULL_PHP . "head.php");
    ?>
</head>
<body id="body_mathematics">
<?php
include(PATH_FULL_PHP . "body_top.php");
?>

<div id="header_placement"></div>

<div class="container" id="top_container">

    <div id="content_placement"></div>

    <?php
    include(PATH_FULL_PHP . "footer.php");
    ?>
</div>
<?php
include(PATH_FULL_PHP . "body_bottom.php");
?>

<script>
    $('#header_placement').append(elevutveckling.generateHeader(elevutveckling.subjects.math.eng));
    $("#content_placement").append(elevutveckling.generateSubjectContent(elevutveckling.subjects.math));
</script>
</body>
</html>