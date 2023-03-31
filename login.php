<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
include_once('includes/header.php');
include_once('includes/menu.php');
$msg="";
if(isUserLoggedin()){
	header('location:index.php');
}





if(isset($_POST['login'])){
	if(userLogin($_POST['username'],$_POST['password'])){
		header('location:index.php');
	}
	else{
		$msg="incorrect username or password!!";
	}
}
?>

<div id="main">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Sign In Form!</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>	
	
	<div class="col-md-8">
		<h2 style="color:red;"><?=$msg?></h2>  
		<form action="" method="post" name="form">
			
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" id="login" name="login" value="Login">

		</form>



	</div>
</div>
</div>

<?php
include_once('includes/footer.php');