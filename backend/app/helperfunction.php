<?php
// function redirect($path){ 
// header('location:'.$path);
// }

function redirection($path){
 	echo '<script>window.location.href="'.$path.'";</script>';
}
function checkAdminLogin(){
	if(isset($_SESSION['admin'] ['username'])){
        return true;
    }
	else{
    	return false;
	}
}
// function checkUserLogin()
// {
// 	if(isset($_SESSION['user'] ['email'])){
//         return true;
//     }
// else{
//     return false;
// }
// }
?>