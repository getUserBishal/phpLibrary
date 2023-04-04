<?php

function query($sql){
	global $connection;
	$resource=mysqli_query($connection,$sql);
	if($resource){
		if(is_object($resource)){
			return $resource->fetch_all(MYSQLI_ASSOC);
		} else{
			return true;
		}

	}
	return false;
}



function isAdminLoggedIn(){
	if(isset($_SESSION['admin'])){
		if($_SESSION['admin']['adminid']>0){
		return true;
	}
	}
	return false;
}






function isUserLoggedIn(){
	if(isset($_SESSION['user'])){
		if($_SESSION['user']['userid']>0){
		return true;
	}
	}
	return false;
}




function login($username,$password){
	$sql="select adminid,username,password from admin where password='$password'";
	$adminrow=query($sql);
	if($adminrow){
	if($adminrow[0]['username']==$username){
		$_SESSION['admin']=$adminrow[0];
		return true;
	}
}
	return false;
}






function userLogin($username,$password){
	$sql="select * from user where password='$password'";
	$userrow=query($sql);
	if($userrow){
		if($userrow[0]['username']==$username){
			$_SESSION['user']=$userrow[0];
			return true;
		}
	}
	return false;
}


    
function insertUser($user){
	$sql="insert into  user(firstname, lastname, address,phoneNo,email,username,password) values('$user[name]','$user[surname]','$user[address]',$user[phoneno],'$user[email]','$user[username]','$user[password]')";
	return query($sql);
}


function borrowBook($userid, $bookid){

    $date = date("y-m-d");
	$sql1 = "insert into borrow(userid, bookid, date) values($userid, $bookid, '$date')";
    $action = query($sql1);
    if($action){
    	$sql2 = "select * from book where bookid = ".$bookid;
    	$resource = query($sql2);

    	$sql3 = "update book set stock = ".((int)$resource[0]['stock']-1)." where bookid = ".$bookid;
    	$action1 = query($sql3);
    	return $action1;
    }
    return false;
}


function insertBook($book){
   
	$sql = "insert into book (bookname, author, published, stock, description, image) values ('".$book['bookname']."','".$book['author']."','".$book['published']."',".$book['stock'].",'".$book['description']."','".$book['image']."')";
    return query($sql);
}

function uploadfile($toolName, $fileName, $newName, $folder, $width, $height)   //function to upload image files
    {
        if ((($_FILES[$toolName]["type"] == "image/gif") || ($_FILES[$toolName]["type"] == "image/jpeg" || ($_FILES[$toolName]["type"] == "image/png") || ($_FILES[$toolName]["type"] == "image/pjpeg")|| ($_FILES[$toolName]["type"] == "image/jpg")) && ($_FILES[$toolName]["size"] < 2000000))) {

            //echo $_POST['field'].$a.$_POST['fabric'].$_POST['prop'].$_POST['location'];
            if ($_FILES[$toolName]["error"] > 0) {
                echo "Return Code: " . $_FILES[$toolName]["error"] . "<br />";

                return "false";
            } else {
                //$a= substr($_FILES[$toolName]["name"],-3,3);

                if (file_exists($folder . $newName . $fileName)) {
                    echo "File already exists. ";
                    $file = $newName . $fileName;
                } else {
                    if (move_uploaded_file($_FILES[$toolName]["tmp_name"], $folder . $newName)) {
                        // echo "Upload Success";
                        $file = $folder . $newName;
                        
                    } else {
                        echo "Upload Unsuccess" . mysql_error();
                    }
                }

                return $newName;
            }
        } else {
            if (isset($_FILES[$toolName]) && $_FILES[$toolName]["name"] != "") {
                $file = "";
                echo ' < div class="headline1" > Invalid file </div > ';

                return false;
            }
        }
    }




?>