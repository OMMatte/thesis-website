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
<script> printJumbotronHeader("Online läxhjälp", "Välkommen till online läxhjälp. Tanken med hemsidan är att hjälpa elever som studerar årskurs X - X med sina studier."); </script>

<div class="container">
    <div class="row">
        <script> printIHoverImage("resources/images/mathematics.jpg", "Matematik"); </script>
        <script> printIHoverImage("resources/images/physics.jpg", "Fysik"); </script>
        <script> printIHoverImage("resources/images/chemistry.jpg", "Kemi"); </script>
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