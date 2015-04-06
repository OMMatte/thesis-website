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

<script>
    printTitle("home");
</script>

<div class="container">
    <div class="row" id="image_row_1">
        <script>
            var id = '#image_row_1';
            $(id).append(printIHoverImage("/resources/images/mathematics.jpg", "Matematik"));
            $(id).append(printIHoverImage("/resources/images/physics.jpg", "Fysik"));
            $(id).append(printIHoverImage("/resources/images/chemistry.jpg", "Kemi"));
        </script>
    </div>

    <?php
    include("$root/dist/php/footer.php");
    ?>
</div>
<?php
include("$root/dist/php/body_bottom.php");
?>
</body>
</html>