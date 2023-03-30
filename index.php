<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
include_once('includes/header.php');
include_once('includes/menu.php');
?>


<header class="text-center" name="home" id="home">
  <img src="img/library.jpg" class="img-circle">
  <div class="intro-text">
    <h1>Library Management System</h1>
    <?php
    if(isUserLoggedIn()) :
    ?>
     <div class="btn-header"><a href="#" class="btn-default header-btn"><strong>Welcome <?=$_SESSION['user']['firstname']?></strong></a></div>
    
    <?php
     elseif(isAdminLoggedIn()) :
    ?>
    <div class="btn-header"><a href="#" class="btn-default header-btn"><strong>Welcome Admin</strong></a></div>
    <?php
    else : 

    ?>
    <div class="btn-header"><a href="login.php" class=" btn-default header-btn"><strong>Login</strong></a></div> </div>
   
    <?php
    endif;
    ?>
</header>

<?php
include_once('includes/footer.php');