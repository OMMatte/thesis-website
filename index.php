<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include(PATH_FULL_PHP . "head.php");
    ?>
</head>

<body id="body_home">


<?php

include(PATH_FULL_PHP . "body_top.php");
?>

<div class="container" id="top_container">
    <div class="row" id="image_row_1">

    </div>

    <?php
    include(PATH_FULL_PHP . "footer.php");
    ?>
</div>
<?php
include(PATH_FULL_PHP . "body_bottom.php");
?>

<script>
    $('#top_container').before(elevutveckling.generateHeader("home"));
</script>

<script>

    var $id = $('#image_row_1');

    $id.append(elevutveckling.generateSubjectImageButtons("mathematics", "/matematik"));

    $id.append(elevutveckling.generateSubjectImageButtons("physics", "/fysik"));

    $id.append(elevutveckling.generateSubjectImageButtons("chemistry", "/kemi"));

</script>

</body>
</html>