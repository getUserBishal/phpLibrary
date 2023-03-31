<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
$sql = "select * from user where userid = ".$_SESSION['user']['userid'];
$user = query($sql);
$sql2 = "select book.bookid, book.bookname, book.author, book.published, book.description from book inner join borrow on book.bookid = borrow.bookid where userid = ".$_SESSION['user']['userid'];
$books = query($sql2);
include_once('includes/header.php');
include_once('includes/menu.php');
?>
<div id="main">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Your Details:</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>	
	
	<div class="col-md-8 user_details">


		
		<table>
			<tr>
				<th> Name</th>
				<td><?=$user[0]['firstname']?> <?=$user[0]['lastname']?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?=$user[0]['address']?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?=$user[0]['email']?></td>
			</tr>
			<tr>
				<th>Phone No.</th>
				<td><?=$user[0]['phoneNo']?></td>
			</tr>
			<tr>
				<th>Useername</th>
				<td><?=$user[0]['username']?></td>
			</tr>
		</table>
		


	</div>
</div>
<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Books You Have Borrowed:</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8 borrow_details">
		<table>
			<tr>
				<th>Book Name</th>
				<th>Author</th>
				<th>Published On</th>
				<th>description</th>
				<th>Action</th>
			</tr>
			<?php foreach($books as $book) :?>
				<tr>
					<td><?=$book['bookname']?></td>
					<td><?=$book['author']?></td>
					<td><?=$book['published']?></td>
					<td><?=$book['description']?></td>
                    <td><a href="view.php?id=<?=$book['bookid']?>">View</a></td>
				</tr>
				<?php endforeach;?>
		</table>
	</div>
	</div>
</div>

<?php
include_once('includes/footer.php');