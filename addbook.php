<?php
include_once('includes/config.php');
include_once('includes/functions.php');


if(!isAdminLoggedIn()){
header('location:admin.php');
}



include_once('includes/header.php');
include_once('includes/menu.php');

$msg = "";



if(isset($_POST['save'])){
	if ($_FILES['prod_img']['name'] != '') {
            $newFile = uploadfile('prod_img', $_FILES['prod_img']['name'],  $_FILES['prod_img']['name'], 'img/', 200, 300);
            $_POST['image'] = '';
            if ($newFile != "false") {
                $_POST['image'] = $newFile;
            }
        }
	
$action = insertBook($_POST);
	
	if($action){
	$msg = "Book detail inserted successfully!!";
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
	<h2>Add Books!</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>	
	
	<div class="col-md-8">
		<h2 style="color:red;"><?=$msg?></h2>
		<form action="" method="post" name="parent" enctype="multipart/form-data">
			<label for="bookname">Book Name</label>
			<input type="text" id="bookname" name="bookname" required>
			<label for="author">Author Name</label>
			<input type="text" id="author" name="author" required>
			<label for="published">Published On</label>
			<input type="text" id="published" name="published" required>
			<label for="stock">Total Stock</label>
			<input type="text" id="stock" name="stock" required>
			
			<label for="description">Description</label>
			<textarea id="description" name="description" rows=3 required></textarea>
			
			<label for="prod_img">Upload image file</label>
			<input type="file" name="prod_img">
			<input type="submit" id="save" name="save" value="Add Book">
		</form>



	</div>
</div>
</div>
<?php
include_once('includes/footer.php');


