<?php
include_once('includes/config.php');
include_once('includes/functions.php'); 
$sql = "select user.firstname, user.lastname, user.address, user.email, book.bookname, book.author, borrow.date from user INNER JOIN borrow ON user.userid = borrow.userid INNER JOIN book ON borrow.bookid = book.bookid";
$records = query($sql);
include_once('includes/header.php');
include_once('includes/menu.php');
?>
<div id="main">
	
<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<h2>Borrow Details:</h2></div>
    </div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8 borrow_details">
		<table>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Book Name</th>
				<th>Date</th>
			</tr>
			<?php foreach($records as $record) :?>
				<tr>
					<td><?=$record['firstname']?> <?=$record['lastname']?></td>
					<td><?=$record['address']?></td>
					<td><?=$record['email']?></td>
					<td><?=$record['bookname']?></td>
                    <td><?=$record['date']?></td>
				</tr>
				<?php endforeach;?>
		</table>
	</div>
	</div>
</div>

<?php
include_once('includes/footer.php');