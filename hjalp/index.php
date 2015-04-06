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
<script> printJumbotronHeader("Hjälp", "Här hittar du lite information om hur sidan fungerar."); </script>


<div class="container" id="hjalp_container">

    <script>
        $(document).ready(function(){
            // Run the question and answer
            bootstrapAccordion('hjalp_container');
        });
    </script>

    <?php
    include("$root/dist/php/footer.php");
    ?>
</div>
<?php
include("$root/dist/php/body_bottom.php");
?>



</body>
</html>