<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
$id = $_GET['id'];
$sql = "select * from book where bookid = ".$id;
$book = query($sql);
include_once('includes/header.php');
include_once('includes/menu.php');
?>
<div id="main">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Book Details:</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>	
	
	<div class="col-md-8 book_details">

		<img src = "img/<?=$book[0]['image']?>">
		<table>
			<tr>
				<th>Book Name</th>
				<td><?=$book[0]['bookname']?></td>
			</tr>
			<tr>
				<th>Author Name</th>
				<td><?=$book[0]['author']?></td>
			</tr>
			<tr>
				<th>Published Date</th>
				<td><?=$book[0]['published']?></td>
			</tr>
			<tr>
				<th>Total Stock</th>
				<td><?=$book[0]['stock']?></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><?=$book[0]['description']?></td>
			</tr>
		</table>
		


	</div>
</div>
</div>

<?php
include_once('includes/footer.php');