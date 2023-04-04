<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
include_once('includes/header.php');
include_once('includes/menu.php');
$msg="";
if(isset($_POST['save'])){
$action = insertUser($_POST);
	
	if($action){
	$msg = "Insertion operation successful!!";
	}
	else{
			
    $msg = "Insertion operation failed!!";
	}
}
?>

<div id="main">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Registration Form!</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>	
	
	<div class="col-md-8">
		<h2 style="color:red;"><?=$msg?></h2>  
		<form action="" method="post" name="form">
			<label for="name">First Name</label>
			<input type="text" id="name" name="name" required>
			<label for="surname">Last Name</label>
			<input type="text" id="surname" name="surname" required>
			<label for="postcode">Address</label>
			<input type="text" id="address" name="address" required>
			<label for="phoneno">Telephone No.</label>
			<input type="number" id="phoneno" name="phoneno" required>
			<label for="email">Email</label>
			<input type="Email" id="email" name="email" required>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" id="save" name="save" value="Register">

		</form>



	</div>
</div>
</div>

<?php
include_once('includes/footer.php');