<?php
include "layouts/header.php";
 $subcategory_id=$_GET['ref'];
 ?>


	<!-- Breadcrumb -->
	<?php 
    $subcategoryName=SelectSubCategoryNameFromId($conn,$subcategory_id);
    // print_r($subcategoryName);
	foreach($subcategoryName as $key){
		?>
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.php" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					<?php echo $key?>
				</span>
			</div>
			<?php } ?>
		</div>
	</div>

	<!-- Page heading -->
	<?php 
	$subcategoryName=SelectSubCategoryNameFromId($conn,$subcategory_id);
    // print_r($subcategoryName);
	foreach($subcategoryName as $key){
		?>
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			<?php echo $key?>
		</h2>
	</div>
<?php }?>
			
	<!-- Feature post -->
	<?php
  $SubcategoryNews=getAllNewsBySubCategoryId($conn,$subcategory_id);
  ?>
	<section class="bg0">
		<div class="container">
			
			<div class="row m-rl--1">
<?php foreach($SubcategoryNews as $key){ ?>
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">

							<h3 class="how1-child2 m-t-14">
								<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
									<?php echo $key['news_title']; ?>
								</a>
							</h3>
						</div>
					</div>
				</div>
			<?php }?>

			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-110 p-b-25">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<?php 
						$getallcategory=selectAllCategory($conn);
						foreach($getallcategory as $key){
						?>
						<!-- National -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl0 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl19 tab01-title">
									<?php echo $key['category_name']; ?>
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-2" role="tab">Province 2</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-3" role="tab">Province 3</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-4" role="tab">Province 4</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-5" role="tab">Province 5</a>
									</li> -->
									
									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>
								

								<!--  -->
								<a href="category-02.php?ref=<?php echo $key['category_id']; ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								
							<!-- Tab panes -->
							<?php
							
									$getNews=getNewsByCategoryID($conn,$key['category_id']);
									// print_r($getNews);
									foreach($getNews as $key){
									
									?>
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active"  >
									
									<div class="row">
										

										<div class="col-sm-12 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="newsDetail.php?ref=<?php echo $key['news_id'];?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo $key['news_title']; ?>
															
														</a>
													</h5> 

													<span class="cl8">
														

														<span class="f1-s-3 m-rl-3">
															
														</span>

														<span class="f1-s-3">
														<?php echo 'Written By:'. $key['news_writtenby']; ?><br/>
															<?php echo $key['created_at']; ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											

											<!-- Item post -->
											<!-- <div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-08.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Nepali 3
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Celebrity
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div> -->

										</div>
									</div>
								</div>

								
								
							</div>
									<?php } ?>
										
						</div>
						<?php } ?>
						
					</div>
				</div>
<!--  -->

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">
						<!-- Banner -->
						<div class="flex-c-s">
							<a href="#">
								<img class="max-w-full" src="images/banner-02.jpg" alt="IMG">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php
	include 'layouts/footer.php';
	?>



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>