<!DOCTYPE html>
<html lang="en">
<head>
	<title>Samachar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
								<iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=FFFFFF&aj_time=yes&font_size=14&line_brake=0&bikram_sambat=0&api=890040j065" width="308" height="22"></iframe>

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
			<div class="wrap-logo container">
				<!-- Logo desktop -->		
				<div class="logo">
					<a href="index.php"><img src="images/icons/samachar.png" alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<div class="banner-header">
					<a href="https://themewagon.com/themes/free-bootstrap-4-html5-news-website-template-magnews2/"><img src="images/banner-01.jpg" alt="IMG"></a>
				</div>
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
								<a href="index.php">Home</a>
							</li>

							


							<?php foreach($categoryList as $key){
								 ?>
							<li>
								<a href="#"><?php echo $key['category_name'];?></a>
								<ul class="sub-menu">
								<?php 
									$subcategoryList=selectSubcategoryFromCategoryId($conn,$key['category_id']);
									foreach($subcategoryList as $key){
										foreach($key as $value){
									?>
									<li><a href="category-01.html"><?php echo $value; ?></a></li>
										<?php } } ?>
								</ul>
							</li>
										<?php }?>


						

							<li>
								<a href="#">Others</a>
								<ul class="sub-menu">
									<li><a href="category-01.html">Travel</a></li>
									<li><a href="category-02.html">Fashion</a></li>
									<li><a href="blog-grid.html">Life Style</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>	
		</div>
	</header>