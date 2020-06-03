<?php
   require_once "start.php";
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Список производителей</title>
      <meta charset="utf8">
      <link rel="stylesheet" type="text/css" href="css/semantic.css">
      <script type="text/javscript" src="css/semantic.js"></script>
      <!--   <script type="text/javscript" src="js/jquery.js"></script> -->
      <style>
         .zayavka_cnt{
         width: 100%;
         height: 100vh;
         position: fixed;
         left: 0;
         top: 0;
         display: block;
         display: none;
         }
         .zayavka_fade{
         position: absolute;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0,0,0,0.92);
         }
         .zayavka_cnt input{
         width: 300px;
         height: 35px;
         border:none;
         margin-top: 20px;
         padding-left: 20px;
         padding-right: 20px;
         }
         .zayavka_cnt input[type=submit]{
         border-radius: 10px;
         background-color: #a6e175;
         cursor: pointer;
         position: relative;
         left: 0;
         transition: all ease 0.5s;
         }
         .zayavka_cnt input[type=submit]:hover{
         left: 7px;
         }
         .zayavka{
         display: -webkit-flex;
         display: -moz-flex;
         display: -ms-flex;
         display: -o-flex;
         display: flex;
         justify-content: center;
         -ms-align-items: center;
         align-items: center;
         -webkit-flex-direction: column;
         -moz-flex-direction: column;
         -ms-flex-direction: column;
         -o-flex-direction: column;
         flex-direction: column;
         position: absolute;
         width: 100%;
         height: 100%;
         z-index: 3;
         }
         .zayavka form{
         flex-direction: column;
         display: -webkit-flex;
         display: -moz-flex;
         display: -ms-flex;
         display: -o-flex;
         display: flex;
         }
         .zayavka_sbt{
         margin-top: 25px;
         }
         .zayavka_close{
         position: absolute;
         right: 30px;
         top: 30px;
         color: #fff;
         font-size: 50px;
         cursor: pointer;
         z-index: 5;
         }
      </style>
   </head>
   <body>
      <? include "blocks/menu.php" ?>
      <div class="ui grid" style="padding-bottom:80px;">
         <div class="row">
            <div class="centered fourteen wide column" style="display: flex;justify-content: center;margin-top: 100px;">
               <?php
                  $id = $_GET['id'];
                  
                                                     		
                                      $query = $pdo->query("SELECT name, id, photo, price_in_day, text FROM car_class WHERE id='$id'");
                                  
                                      foreach($query->fetchAll() as $manufacturer) {
                                          $name = $manufacturer[0];
                                          $id = $manufacturer[1];
                                          $photo = $manufacturer[2];
                                          $price_in_day = $manufacturer[3];                
                                          $text = $manufacturer[4];
                  			
                  			?>
               <div class="ui card" style="width:500px;">
                  <div class="image">
                     <img src="<?= $photo ?>">
                  </div>
                  <div class="content">
                     <a class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $name ?></font></font></a>
                     <div class="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        <?= $text ?>
                        </font></font>
                     </div>
                  </div>
                  <div class="extra content">
                     Цена аренды = <?= $price_in_day ?> руб./ сутки
                  </div>
                  <button class="ui yellow button open_zayavka"style="margin-top:10px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Арендовать</font></font></button> 
               </div>
               <?
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="zayavka_cnt">
         <div class="zayavka_fade"></div>
         <div class="zayavka_close">×</div>
         <div class="zayavka">
            <form>
               <input type="text" class="inp_1" placeholder="Ваше имя" required>
               <input type="text" class="inp_2"  placeholder="+7 (000) 000-00-00" required>
               <input type="text" class="inp_3" placeholder="Кол-во дней" required>
               <div class="zayavka_sbt">
                  <input type="submit" value="Отправить">
            </form>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/jquery.mask.min.js"></script>
      <script>
         $( ".open_zayavka" ).click(function() {
         $( ".zayavka_cnt" ).fadeIn();
         $( ".zayavka_close" ).click(function() {
         $( ".zayavka_cnt" ).fadeOut();
         });
         
         
         });
         
         $( ".zayavka_sbt input" ).click(function() {
         
         	var name = $(".inp_1").val();
         	var phone = $(".inp_2").val();
         	var day = $(".inp_3").val();
         
         
         
         	if( name == '') {
         		alert('Пожалуйста, заполните Ваше имя');
         	}
         
         	else if( phone == '') {
         		alert('Пожалуйста, заполните Ваш телефон');
         	}
         
         	else if( day == '') {
         		alert('Пожалуйста, заполните кол-во дней');
         	}
         
         	else {
         		alert('Ваша заявка оформлена, мы перезвоним Вам в ближайшее время!');
         	    $( ".zayavka_cnt" ).fadeOut();
         	}
         
         
         	
         
         	return false;
         
         
         
         });
         
         $(document).ready(function () {
         
         $('.inp_2').mask('+7 (000) 000-00-00');
         
         $('.inp_3').mask('00');
         });
      </script>
   </body>
</html>
