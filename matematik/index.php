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

    <?php
    include($full_php_path . "footer.php");
    ?>
</div>
<?php
include($full_php_path . "body_bottom.php");
include($full_php_path . "global_variables_js.php");
?>

<script>
    elevutveckling.generateSubjectBody(function ($html) {
        $("#top_container").prepend($html);
    });
</script>
</body>
</html>