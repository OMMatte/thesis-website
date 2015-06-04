<html lang="en">
<head>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/constants.php");
    include(PATH_FULL_PHP . "head.php");
    ?>
</head>
<body id="body_hjalp">
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
    $('#top_container').before(elevutveckling.generateHeader("hjalp"));
</script>

<script>
    elevutveckling.retrieveJsonData(elevutveckling.paths.json + "hjalp.json", function (jsonData) {
        $('#top_container').prepend(elevutveckling.generateBootstrapAccordionHtml(jsonData));
    });

</script>

</body>
</html>