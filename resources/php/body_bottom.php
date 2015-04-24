<!-- Main javascript functions -->
<script type="text/javascript" src="<?php echo $js_path ?>main.js"></script>
<script type="text/javascript" src="<?php echo $js_path ?>elevutveckling.js"></script>
<script type="text/javascript" src="<?php echo $js_path ?>header.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo $framework_js_path ?>bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo $framework_js_path ?>ie10-viewport-bug-workaround.js"></script>


<script id="hiddenlpsubmitdiv" style="display: none;"></script>
<script>try {
        for (var lastpass_iter = 0; lastpass_iter < document.forms.length; lastpass_iter++) {
            var lastpass_f = document.forms[lastpass_iter];
            if (typeof(lastpass_f.lpsubmitorig2) == "undefined") {
                lastpass_f.lpsubmitorig2 = lastpass_f.submit;
                lastpass_f.submit = function () {
                    var form = this;
                    var customEvent = document.createEvent("Event");
                    customEvent.initEvent("lpCustomEvent", true, true);
                    var d = document.getElementById("hiddenlpsubmitdiv");
                    if (d) {
                        for (var i = 0; i < document.forms.length; i++) {
                            if (document.forms[i] == form) {
                                if (typeof(d.innerText) != 'undefined') {
                                    d.innerText = i;
                                } else {
                                    d.textContent = i;
                                }
                            }
                        }
                        d.dispatchEvent(customEvent);
                    }
                    form.lpsubmitorig2();
                }
            }
        }
    } catch (e) {
    }
</script>


<script>
    // Effects for the navigation bar
    elevutveckling.header.navbarEffects();
</script>

<?php
include($root_path . "/global_variables_js.php");
?>
