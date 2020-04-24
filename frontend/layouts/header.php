<!DOCTYPE html>
<html lang="en">
<head>
	<title>Samachar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--===============================================================================================-->	   
	<link rel="icon" type="image/png" href="images/icons/samachar.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/custom.css">
<!--===============================================================================================-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style type="text/css">
@media screen and (min-width: 768px){
  .dropdown:hover .dropdown-menu, .btn-group:hover .dropdown-menu{
        display: block;
        
    }
    .dropdown-menu{
        margin-top: 0;
    }
    .dropdown-toggle{
        margin-bottom: 2px;
    }
    .navbar .dropdown-toggle, .nav-tabs .dropdown-toggle{
        margin-bottom: 0;
    }
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown, .btn-group").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     
</script>
<!--===============================================================================================-->
</head>
<body class="animsition">

	<?php
	include '../backend/app/call.php';
	$categoryList=selectAllCategory($conn);


	$advertisement_banner=selectAllAdvertisement($conn);
	 //dump($advertisement_banner);


	foreach($advertisement_banner as $key => $value){		
 		$date_expiry = $value['advertisement_expiry_date'];
 		$date_today = date("Y-m-d");
 		if ($date_expiry==$date_today) {
 			$advertisement_id =  $value['advertisement_id'];
 			deleteAdvertisement($conn, $advertisement_id);
 		}
	}
	?>
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar container h-100">
					<div class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								<!-- New York, NY -->
								<!-- <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=FFFFFF&aj_time=yes&font_size=14&line_brake=0&bikram_sambat=0&api=890040j065" width="308" height="22"></iframe> -->
									<iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="https://www.ashesh.com.np/linknepali-time.php?dwn=only&font_color=FFFFFF&font_size=15&api=800144j563" width="165" height="20"></iframe>
							</span>

							<!-- <img class="m-b-1 m-rl-8" src="images/icons/icon-night.png" alt="IMG"> -->

							<!-- <span>
								HI 58° LO 56°
							</span> -->
						</span>

						<a href="about.php" class="left-topbar-item">
							About
						</a>

						<a href="contact.php" class="left-topbar-item">
							Contact
						</a>


						
					</div>

					<div class="right-topbar">
						<a href="#">
							<i class="fab fa-facebook"></i>
						</a>

						<a href="#">
							<i class="fab fa-twitter-square"></i>
						</a>

						<a href="#">
							<i class="fab fa-google-plus-square"></i>
						</a>

						<a href="#">
							<i class="fab fa-youtube-square"></i>
						</a>
					</div>
				</div>
			</div>
 
			<!-- Header Mobile --> 
			
			<!--  -->
			<div class="wrap-logo " style="width:15%;height:150px;">
				<!-- Logo desktop -->		
				<div class="logo" style="width:100%;height:100%">
					<a href="index.php"><img  src="images/icons/samachar.png"  alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				
			</div>	
			
			<!--  -->
			
					<!-- Menu desktop -->
					
						<a class="logo-stick" href="index.html">
							<img src="images/icons/samachar.png" alt="LOGO">
						</a>
					

						<nav class="navbar navbar-expand-lg navbar-light bg-light">
  								
  								<a class="navbar-brand" href="index.php"><i style="padding-left:80px"; class="fas fa-home"></i></a>
  						
  						<div class="collapse navbar-collapse" id="navbarNavDropdown">
    						<ul class="navbar-nav" style="padding-left:50px";>
							<?php foreach($categoryList as $key){
								 ?>

								 <li class="nav-item dropdown">
        						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="category-02.php?ref=<?php echo $key['category_id'];  ?>" style="font-size:20px; color:black"><?php echo $key['category_name'];?>
        							</a>
							<!-- <li>
								<a href="category-02.php?ref=<?php echo $key['category_id'];  ?>"><?php echo $key['category_name'];?></a> -->
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php 
									$subcategoryList=selectSubcategoryFromCategoryId($conn,$key['category_id']);
									foreach($subcategoryList as $key){
										// foreach($key as $value){
									?>
									<a class="dropdown-item" href="subCategoryViewAll.php?ref=<?php echo $key['subcategory_id'] ?>" style="font-size:20px; color:black"><?php echo $key['subcategory_name']; ?></a>
										<?php }  ?>
										</div>

							</li>
										<?php }?>

							
						</ul>
						<strong><a href="../EnglishFrontend/index.php" target="_blank" class="moen ml-3"><span style="color:blue">ENGLISH</span></a></strong>
					</nav>
				</div>
			</div>	
		</div>
	</header>
