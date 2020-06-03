<?php
   require_once "start.php";
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Аренда автомобилей</title>
      <meta charset="utf8">
      <link rel="stylesheet" type="text/css" href="css/semantic.css">
      <script type="text/javscript" src="css/semantic.js"></script>
      <script type="text/javscript" src="js/jquery.js"></script>
      <style>
         .ui.menu{
         margin-bottom:0px;
         }
         .main{
         width:100%;
         height:100%;
         filter: blur(5px);
         background-image: url(https://s1.1zoom.ru/b5050/669/Mercedes-Benz_Maybach_Vision_6_Front_Wine_color_528959_1920x1080.jpg);
         background-size: cover;
         background-position: 50% 50%;
         background-repeat: no-repeat;
         position:absolute;
         }
         .main_cnt{
         max-width:1100px;
         margin:0 auto;
         padding-top:160px;
         position:absolute;
         z-index:2;
         left:50%;
         transform:translateX(-50%);
         }
         .main_cnt h1{
         font-size:100px;
         text-align:center;
         color:#fff;
         }
         .cnt{
         position:relative;
         width:100%;
         height:100%;
         }
         .main_cnt p{
         font-size:20px;
         text-align:center;
         color:#fff;
         margin-top:50px;
         }
      </style>
   </head>
   <body >
      <? include "blocks/menu.php" ?>
      <div class="cnt">
         <div class="main"></div>
         <div class="main_cnt">
            <h1>AutoRent</h1>
            <p>Добро пожаловать на наш сайт по аренде машин премиум-класса.<br>
            Для того чтобы арендовать машину выполните следующие шаги:<br>
            Шаг 1 - Зарегестрируйтесь.<br>
            Шаг 2 - Зайдите в раздел "Автомобили" и выберите машину,которую хотите арендовать.<br>
            Шаг 3 - Оформите заявку на аренду автомобиля.<br>
            Шаг 4 - Ожидайте скорого звонка нашего менеджера. </p>
         </div>
      </div>
   </body>
</html>
