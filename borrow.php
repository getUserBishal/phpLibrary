<?php
include_once('includes/config.php');
include_once('includes/functions.php');
$id = $_GET['id'];
$msg = "";
$sq = "select * from book where bookid = ".$id;
$stock = query($sq);
if((int)$stock[0]['stock']>0){
if(borrowBook($_SESSION['user']['userid'], $id)){
	$msg = "You have successfully borrowed a book!";
}
else{
	$msg = "operation failed!";

}
}
else{
	$msg = "Book out of stock!";
}
include_once('includes/header.php');
include_once('includes/menu.php');

?>
<div id="main">
	<div id = "borrow">
<h2><?=$msg?></h2>
</div>
</div>
<?php
include_once('includes/footer.php');