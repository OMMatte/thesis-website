<?php
// current directory

require("../head.php");
?>
<script> printJumbotronHeader("Hjälp", "Här hittar du lite kort information om hur sidan fungerar."); </script>


    <div class="container">
      <div>
        <a href="javascript:reverseDisplay('uniquename')">
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
require("../footer.php");
?>