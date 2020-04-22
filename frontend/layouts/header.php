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
</head>
<body class="animsition">

	<?php
	include '../backend/app/call.php';
	$categoryList=selectAllCategory($conn);
	// print_r($categoryList);
	$AdvertisementCategoryGold='gold';
	$Advertisement_banner=selectAllAdvertisementOfGold($conn,$AdvertisementCategoryGold);
		foreach($Advertisement_banner as $key){
	 		$date_expiry = $key['advertisement_expiry_date'];
	 		$date_today = date("Y-m-d");
	 		if ($date_expiry==$date_today) {
	 			$advertisement_id =  $key['advertisement_id'];
	 			deleteAdvertisement($conn, $advertisement_id);
	 		}
		}
	// print_r($Advertisement_banner);

	$AdvertisementCategorySilver='silver';
	$Advertisement_bannerSilver=selectAllAdvertisementOfSilver($conn,$AdvertisementCategorySilver);
	// print_r($Advertisement_bannerSilver);
	foreach($Advertisement_bannerSilver as $key){
	 		$date_expiry = $key['advertisement_expiry_date'];
	 		$date_today = date("Y-m-d");
	 		if ($date_expiry==$date_today) {
	 			$advertisement_id =  $key['advertisement_id'];
	 			deleteAdvertisement($conn, $advertisement_id);
	 		}
		}

	$AdvertisementCategoryBronze='bronze';
	$Advertisement_bannerBronze=selectAllAdvertisementOfBronze($conn,$AdvertisementCategoryBronze);
	// print_r($Advertisement_bannerBronze);
	foreach($Advertisement_bannerBronze as $key){
	 		$date_expiry = $key['advertisement_expiry_date'];
	 		$date_today = date("Y-m-d");
	 		if ($date_expiry==$date_today) {
	 			$advertisement_id =  $key['advertisement_id'];
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
									<iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="https://www.ashesh.com.np/linknepali-time.php?dwn=only&font_color=FFFFFF&font_size=14&api=800144j563" width="165" height="22"></iframe>
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
			<div class="wrap-logo ">
				<!-- Logo desktop -->		
				<div class="logo" >
					<a href="index.php"><img  src="images/icons/samachar.png" alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<?php
				foreach($Advertisement_banner as $key){
				?>
				<div class="banner-header" style="border:1px black solid;">
					
					<a href="#"><img class="banner-header" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"  alt="GoldAdvertisement"></a>
				</div>
				<?php } ?>
			</div>	
			
			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="index.html">
							<img src="images/icons/samachar.png" alt="LOGO">
						</a>

						<ul class="main-menu">
							<li class="main-menu-active">
								<a href="index.php"><i class="fas fa-home"></i></a>
							</li>

							


							<?php foreach($categoryList as $key){
								 ?>
							<li>
								<a href="category-02.php?ref=<?php echo $key['category_id'];  ?>"><?php echo $key['category_name'];?></a>
								<ul class="sub-menu">
								<?php 
									$subcategoryList=selectSubcategoryFromCategoryId($conn,$key['category_id']);
									foreach($subcategoryList as $key){
										// foreach($key as $value){
									?>
									<li><a href="subCategoryViewAll.php?ref=<?php echo $key['subcategory_id'] ?>"><?php echo $key['subcategory_name']; ?></a></li>
										<?php }  ?>
								</ul>
							</li>
										<?php }?>


						

							<li>
								<a href="#">Others</a>
								<ul class="sub-menu">
									<li><a href="about.php">About Us</a></li>
									<li><a href="contact.php">Contact Us</a></li>
								</ul>
							</li>
							<strong><a href="../EnglishFrontend/index.php" target="_blank" class="moen ml-3"><span style="color:maroon">ENGLISH</span></a></strong>
						</ul>
					</nav>
				</div>
			</div>	
		</div>
	</header>