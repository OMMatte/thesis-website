<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include($full_php_path . "head.php");
    ?>
</head>
<body id="body_chemistry">
<?php
include($full_php_path . "body_top.php");
?>

<div class="container" id="top_container">

    <?php
    include($full_php_path . "footer.php");
    ?>
</div>
<?php
include($full_php_path . "body_bottom.php");
?>

<script>
    elevutveckling.generateHeaderHelper(elevutveckling.subjects.chem.eng, function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    elevutveckling.generateSubjectBody(elevutveckling.subjects.chem, function ($html) {
        $("#top_container").prepend($html);
    });
</script>
</body>
</html>