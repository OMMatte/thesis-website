<html lang="en">
<head>
<!--    --><?php
//    define('QA_BASE_DIR', 'qa/fysik/');
//
//    require_once QA_BASE_DIR.'qa-include/qa-base.php';
//    require_once QA_BASE_DIR.'qa-include/qa-app-users.php';
//    require_once QA_BASE_DIR.'qa-include/qa-db.php';
//
//    //qa_base_db_connect(null);
//
//    ?>


    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
    include($full_php_path . "head.php");
    ?>
</head>

<body id="body_home">


<?php
//echo qa_get_logged_in_userid().' '.qa_get_logged_in_handle().' '.qa_get_logged_in_email().' '.qa_get_logged_in_level();

include($full_php_path . "body_top.php");
?>

<div class="container" id="top_container">
    <div class="row" id="image_row_1">

    </div>

    <?php
    include($full_php_path . "footer.php");
    ?>
</div>
<?php
include($full_php_path . "body_bottom.php");
?>




<!---->
<!--<div class="middlePage">-->
<!--    <div class="panel panel-info">-->
<!--        <div class="panel-heading">-->
<!--            <h3 class="panel-title">Please Sign In</h3>-->
<!--        </div>-->
<!--        <div class="panel-body">-->
<!---->
<!--            <div class="row">-->
<!---->
<!--                <div class="col-md-5">-->
<!--                    <a href="#"><img src="http://techulus.com/buttons/fb.png"/></a><br/>-->
<!--                    <a href="#"><img src="http://techulus.com/buttons/tw.png"/></a><br/>-->
<!--                    <a href="#"><img src="http://techulus.com/buttons/gplus.png"/></a>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-7" id="login_area" style="border-left:1px solid #ccc;height:160px">-->
<!--                    <form class="form-horizontal">-->
<!--                        <fieldset>-->
<!---->
<!--                            <input id="textinput" name="textinput" type="text" placeholder="Enter User Name"-->
<!--                                   class="form-control input-md">-->
<!---->
<!--                            <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">-->
<!--                                <small> Remember me</small>-->
<!--                            </div>-->
<!--                            <input id="textinput" name="textinput" type="text" placeholder="Enter Password"-->
<!--                                   class="form-control input-md">-->
<!---->
<!--                            <div class="spacing"><a href="#">-->
<!--                                    <small> Forgot Password?</small>-->
<!--                                </a><br/></div>-->
<!--                            <button id="singlebutton" name="singlebutton" class="btn btn-info btn-sm pull-right">Sign In-->
<!--                            </button>-->
<!---->
<!---->
<!--                        </fieldset>-->
<!--                    </form>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->

<script>
    elevutveckling.generateHeaderHelper("home", function (html) {
        $('#top_container').before(html);
    });
</script>

<script>

    var id = '#image_row_1';

    elevutveckling.genereateIHoverImageHelper("mathematics", function (htmlMath) {
        $(id).append(htmlMath);
    }, "/matematik");

    elevutveckling.genereateIHoverImageHelper("physics", function (htmlPhysics) {
        $(id).append(htmlPhysics);
    }, "/fysik");

    elevutveckling.genereateIHoverImageHelper("chemistry", function (htmlChemistry) {
        $(id).append(htmlChemistry);
    }, "/kemi");
</script>

</body>
</html>