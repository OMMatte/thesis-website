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
<script> printJumbotronHeader("Röda korset", "Välkommen till röda korsets elevutveckling. Via denna sida kan man få hjälp med sina studier för årskurs X - X. Ni kan också få information om hur vi arbetar på röda korset och hur ni kan hjälpa till."); </script>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <script> printIHoverImage("/resources/images/mathematics.jpg", "Matematik"); </script>
        <script> printIHoverImage("/resources/images/physics.jpg", "Fysik"); </script>
        <script> printIHoverImage("/resources/images/chemistry.jpg", "Kemi"); </script>
    </div>
    <div class="row">
        <script> printIHoverImage("/resources/images/roda_korset.jpg", "Röda Korset", "Röda korsets hemsida"); </script>
        <script> printIHoverImage("/resources/images/manskliga_rattigheter.jpg", "Mänskliga Rättigheter"); </script>
        <script> printIHoverImage("/resources/images/yttrandefrihet.jpg", "yttrandefrihet"); </script>
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