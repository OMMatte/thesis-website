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
<script> printJumbotronHeader("Hjälp", "Här hittar du lite kort information om hur sidan fungerar."); </script>


<div class="container" id="test2">


    <div>
        <a id="test" href="javascript:reverseDisplay('uniquename')">
            Hur blir jag en lärare?
        </a>
    </div>

    <div id="uniquename" style="display:none;">
        <p>Det blir du såhär.</p>
    </div>

    <div>
        <a href="javascript:reverseDisplay('uniquename2')">
            Hur kontaktar jag en lärare?
        </a>
    </div>

    <div id="uniquename2" style="display:none;">
        <p>Det gör du såhär.</p>
    </div>

    <?php
    include("$root/dist/php/footer.php");
    ?>
</div>
<?php
include("$root/dist/php/body_bottom.php");
?>
</body>
</html>t>