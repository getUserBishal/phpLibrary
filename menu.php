<nav id="nav">
  <div class="container"> 
    <span id="brand">Library Management System</span>
    <?php if(isUserLoggedIn()) :?>
        <span id="menu"><a href="logout.php">Logout</a></span>
        <span id="menu"><a href="portfolio.php">Portfolio</a></span>
        <span id="menu"><a href="books.php">Books</a></span>
        <span id="menu"><a href="index.php">Home</a></span>

    <?php elseif(isAdminLoggedIn()) :?>
         <span id="menu"><a href="adminlogout.php">Logout</a></span>
         <span id="menu"><a href="viewborrow.php">View Borrow</a></span>
         <span id="menu"><a href="addbook.php">Add Books</a></span>
         <span id="menu"><a href="index.php">Home</a></span>

   
<?php else :?>
	<span id="menu"><a href="admin.php">Admin</a></span>    
    <span id="menu"><a href="register.php">Register</a></span>
    <span id="menu"><a href="login.php">Login</a></span>
     <span id="menu"><a href="index.php">Home</a></span>
	<?php endif ;?>
    </div>
</nav>  