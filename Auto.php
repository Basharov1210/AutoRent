<?php
   require_once "start.php";
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Автомобили</title>
      <meta charset="utf8">
      <link rel="stylesheet" type="text/css" href="css/semantic.css">
      <script type="text/javscript" src="css/semantic.js"></script>
      <script type="text/javscript" src="js/jquery.js"></script>
   </head>
   <body>
      <? include "blocks/menu.php" ?>
      <div class="ui three column grid">
         <?php
            $query = $pdo->query("SELECT name, id, photo, price_in_day FROM car_class ORDER BY id DESC");
            
            foreach($query->fetchAll() as $manufacturer) {
                $name = $manufacturer[0];
                $id = $manufacturer[1];
                $photo = $manufacturer[2];
                $price_in_day = $manufacturer[3];
            
            ?>
         <div class="column">
            <div class="ui fluid card">
               <div class="image">
                  <a href="inner_page.php?id=<?= $id ?>">
                  <img src="<?= $photo ?>" style="height:328px !important; width:100%; object-fit: cover;">
                  </a>
               </div>
               <div class="content">
                  <a class="header" href="inner_page.php?id="<?= $id ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $name ?></font></font></a>
               </div>
            </div>
         </div>
         <?
            }
            ?>
      </div>
   </body>
</html>
