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

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grupprum</h3>
                </div>
                <div class="panel-body">
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Frågor & Svar</h3>
                </div>
                <div class="panel-body">
                </div>
            </div>

        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="http://www.google.com" class="list-group-item">Wolfram Alpha</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>

            </div>
        </div>
    </div>
    <!--/.sidebar-offcanvas-->

    <?php
    include($full_php_path . "footer.php");
    ?>
</div>
<?php
include($full_php_path . "body_bottom.php");
include($full_php_path . "global_variables_js.php");
?>

<script>
    generateHeaderHelper("mathematics");
</script>

<script>
</script>

</body>
</html>