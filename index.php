<?php
echo getcwd() . "\n";
require("head.php");
?>
<script> printJumbotronHeader("Online läxhjälp", "Välkommen till online läxhjälp. Tanken med hemsidan är att hjälpa elever som studerar årskurs X - X med sina studier."); </script>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <script> printIHoverImage("resources/images/mathematics.jpg", "Matematik"); </script>
        <script> printIHoverImage("resources/images/physics.jpg", "Fysik"); </script>
        <script> printIHoverImage("resources/images/Chemistry.jpg", "Kemi"); </script>
      </div>

<?php
require("footer.php");
?>