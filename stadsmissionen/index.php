<?php
// current directory

require("../head.php");
?>
<script> printJumbotronHeader("Stadsmissionen", "Välkommen till Stadsmissionens elevutveckling. Via denna sida kan man få hjälp med sina studier för årskurs X - X. Ni kan också få information om hur vi arbetar på Stadsmissionen och hur ni kan hjälpa till."); </script>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <script> printIHoverImage("/resources/images/mathematics.jpg", "Matematik"); </script>
        <script> printIHoverImage("/resources/images/physics.jpg", "Fysik"); </script>
        <script> printIHoverImage("/resources/images/chemistry.jpg", "Kemi"); </script>
      </div>
      <div class="row">
      	<script> printIHoverImage("/resources/images/stadsmissionen.jpg", "Stadsmissionen", "Gå till Stadsmissionens hemsida"); </script>
      	<script> printIHoverImage("/resources/images/manskliga_rattigheter.jpg", "Mänskliga Rättigheter"); </script>
      	<script> printIHoverImage("/resources/images/yttrandefrihet.jpg", "yttrandefrihet"); </script>
      </div>
<?php
require("../footer.php");
?>