<html lang="en">
<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include("$root/dist/php/head.php");
    ?>
</head>
<body>
<?php
include("$root/dist/php/body_top.php");
?>


<div class="container" id="hjalp_container">
    <?php
    include("$root/dist/php/footer.php");
    ?>
</div>
<?php
include("$root/dist/php/body_bottom.php");
?>

<script>
    printHeaderHelper("hjalp");
</script>

<script>
    retrieveJsonData("/json/hjalp.json", function (jsonData) {
        $('#hjalp_container').prepend(generateBootstrapAccordionHtml(jsonData));
    });

</script>

</body>
</html>