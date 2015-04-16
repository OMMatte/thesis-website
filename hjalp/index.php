<html lang="en">
<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $php_path = "/resources/php";
    include("$root$php_path/head.php");
    ?>
</head>
<body>
<?php
include("$root$php_path/body_top.php");
?>


<div class="container" id="top_container">
    <?php
    include("$root$php_path/footer.php");
    ?>
</div>
<?php
include("$root$php_path/body_bottom.php");
?>

<script>
    generateHeaderHelper("hjalp", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>
    retrieveJsonData("hjalp.json", function (jsonData) {
        $('#top_container').prepend(generateBootstrapAccordionHtml(jsonData));
    });

</script>

</body>
</html>