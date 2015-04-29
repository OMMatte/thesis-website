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

<div class="container" id="top_container">

    <?php
    include(PATH_FULL_PHP . "footer.php");
    ?>
</div>
<?php
include(PATH_FULL_PHP . "body_bottom.php");
?>

<script>
    elevutveckling.generateHeaderHelper(elevutveckling.subjects.math.eng, function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    elevutveckling.generateSubjectBody(elevutveckling.subjects.math, function ($html) {
        $("#top_container").prepend($html);
    });
</script>
</body>
</html>