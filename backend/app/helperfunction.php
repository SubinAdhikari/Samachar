<?php
function redirect($path){ 
header('location:'.$path);
}

// function checkAdminLogin()
// {
// 	if(isset($_SESSION['admin'] ['email'])){
//         return true;
//     }
// else{
//     return false;
// }
// }
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