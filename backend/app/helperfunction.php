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
 function dump($data){
 	echo "<pre>";
 	print_r($data);
 	echo "</pre>";
 }
 function showMsg($msg){
 	$_SESSION['msg']='<div class="alert alert-block alert-success">
									<button class="close" type="button" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>									
									<strong class="green">YAY!!!!										
									</strong>
									'.$msg.'
								</div>';
 }
?>