<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
$count = 1;
$sql = "select * from book";
$books = query($sql);
include_once('includes/header.php');
include_once('includes/menu.php');
?>

<div id="main">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Available Books:</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>	
	
	<div class="col-md-8">
		<table>
			<tr>
				<th>S.N.</th>
				<th>Image</th>
				<th>Book Name</th>
				<th>Author</th>
				<th>In Stock</th>
				<th>Action</th>
			</tr>
			<?php 
             foreach($books as $book) :
            
			?>
			<tr>
				<td><?=$count++?></td>
				<td><img src="img/<?=$book['image']?>"></td>
				<td><?=$book['bookname']?></td>
				<td><?=$book['author']?></td>
				<td><?=$book['stock']?></td>
				<td><a href="view.php?id=<?=$book['bookid']?>">View</a> / <a href="borrow.php?id=<?=$book['bookid']?>">Borrow</a></td>

			</tr>
			<?php
             endforeach;
			?>
		</table>
	</div>
</div>
</div>

<?php
include_once('includes/footer.php');