<div class="ui pointing menu">
   <a class="header item" href="index.php">AutoRent</a>
   <a class="item" href="Auto.php">Автомобили</a>
   <a class="item" href="manufactureres.php">Производители</a>
   <?php
      if (isset($_SESSION['user']) && ($_SESSION['user']['userType'] == "Администратор")){
       
      echo ' <a class="item" href="adm.php">Добавление авто</a>';
        }
       ?>
   <div class="right menu">
      <?php                    
         if (!isset($_SESSION['isUserLoggined']) && !$_SESSION['isUserLoggined']) {
             echo '<a class="item" href="login.php">Войти</a>';
             echo '<a class="item" href="reg.php">Регистрация</a>';
         } else {
             echo '<a class="item" href="profile.php">Профиль</a>';
             echo '<a class="item" href="logout.php">Выход</a>';
         }
         ?>
   </div>
</div>
