<?php
   require_once "start.php";
       
   $msg = "";
   
   if (!empty($_POST['regButton'])) {
       
       $name = $_POST['name'];
       $photo = $_POST['photo'];
       $price_in_day = $_POST['price_in_day'];
        $text = $_POST['text'];
        
       
           
           $insert_stmt = $pdo->prepare("INSERT INTO `car_class` 
               (`name`, `photo`,`price_in_day`, `text`) 
               VALUES 
               (:name, :photo, :price_in_day, :text);
           ");
           
           $insert_stmt->bindValue(":name", $name);
           $insert_stmt->bindValue(":photo", $photo);
           $insert_stmt->bindValue(":price_in_day", $price_in_day);
            $insert_stmt->bindValue(":text", $text);
             
           
           if ($insert_stmt->execute()) {
               $msg = "Авто добавлено";
               $type = "green";
           } else {
               $msg = "Ошибка бд";
               $type = "red";
              // print_r($insert_stmt->errorInfo());
           }
           
       }
   
   
   
       
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>adminpanel</title>
      <link rel="stylesheet" type="text/css" href="css/semantic.css">
      <script type="text/javscript" src="css/semantic.js"></script>
      <script type="text/javscript" src="js/jquery.js"></script>
   </head>
   <body>
      <div>
         <div class="header-blue">
            <? include "blocks/menu.php" ?>
            <div class="container hero" style="margin-top: 20px;width: 600px;">
               <div class="row">
                  <div class="col" style="height: 70px;">
                     <h1 class="text-center" style="margin-top: 0px;font-weight: bold;">Добавление авто</h1>
                  </div>
               </div>
               <div class="row">
                  <div class="col">
                     <div class="form-container">
                        <?php
                           if (!empty($msg)) {
                               echo <<<END
                                   <div class='ui {$type} icon message'>
                                       <i class='inbox icon'></i>
                                       <div class='content'>
                                           <div class='header'>
                                               Уведомление
                                           </div>
                                           <p>{$msg}</p>
                                       </div>
                                   </div>
                           END;
                           }
                           ?>
                        <div class="image-holder"></div>
                        <form method="post">
                           <div class="form-row">
                              <div class="col">
                                 <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Марка авто" required></div>
                                 <div class="form-group"><input class="form-control" type="text"  name="photo" placeholder="Фото машины" required></div>
                                 <div class="form-group"><input class="form-control" type="text" name="price_in_day" placeholder="Цена" required></div>
                              </div>
                              <div class="col">
                                 <div class="form-group"><input class="form-control" type="text"name="text" placeholder="Характеристики" required></div>
                                 <div class="form-group"></div>
                                 <div class="form-group"></div>
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="col">
                                 <div class="form-group"><input class="btn btn-primary btn-block" type="submit" name="regButton" value="Добавить"></div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
