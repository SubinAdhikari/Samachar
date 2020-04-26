<?php
include "layouts/header.php";
$category_id=$_GET['ref'];
$decryptID=decryptionFunction($category_id);
?>

		
	<!-- Headline -->
	<?php 
	$categoryName=getCategoryDetailByCategoryID($conn,$decryptID);
	foreach($categoryName as $key){
		?>
	<center><div style="width:95%">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<h3 class="f1-m-2 cl3 tab01-title">
					<?php echo '<strong>'.$key['category_name'].'</strong>';?>		
				</h3>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	<?php }?>
	</div></center>
	<center><div style="width:95%">
		<?php
								$area = 'category_page';
								$specificArea = 'below_categoryTitleFirst';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img width="95%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					foreach($advertisement1 as $key){
				?>
											<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img width="95%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } ?> 
	</div></center>	
	<!-- Feature post -->
	<center><section class="bg0">
		<?php
  $category=getAllNewsByCategoryId($conn,$decryptID);
  ?>
		<div style="width:95%">
			<div class="row m-rl--1">
				<?php foreach($category as $key){ 
					$encryptedURL=encryptionFunction($key['news_id']);
					?>

				<div class="col-sm-6 col-lg-4 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-12 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">

						<div class="flex-col-e-s s-full p-rl-25 p-tb-11">
							

							<h3 class="how1-child2 m-t-10">
								<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
									<?php echo $key['news_title']; ?>
								</a>
							</h3>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</section></center>
	<hr>
	<center><div style="width:95%">
		<?php
								
								$specificArea = 'below_categoryNewsList';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img width="95%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					
				?>
					
				
	</div></center>
	<!-- Post -->
	<section class="bg0 p-t-70" style="width:95%;margin-left:35px">
		<div >
			<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<?php 
						$getallcategory=selectAllCategory($conn);
						foreach($getallcategory as $key){
							$encryptedURL=encryptionFunction($key['category_id']);
						?>
						<!-- National -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl0 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h1 class="f1-m-2 cl19 tab01-title" style="font-size:30px; color:#027ab5!important;">
									<?php echo $key['category_name']; ?>
								</h1>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									
									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>
								

								<!--  -->
								<a href="category-02.php?ref=<?php echo $encryptedURL; ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								
							<!-- Tab panes -->
							<div class="card-group">
										<?php
							
									$getNews=getNewsByCategoryID($conn,$key['category_id']);
									// print_r($getNews);
									foreach($getNews as $key){
										$encryptedURL=encryptionFunction($key['news_id']);
									?>
												  <div class="card" style="margin:3px;border-radius:20px">
												  	<a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <img src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
												</a>
												    <div class="card-body">
												      <h5><a href="newsDetail.php?ref=<?php echo $encryptedURL;?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a></h5>
												      <p class="card-text"><small class="text-muted"><?php echo 'Written By:'. $key['news_writtenby']; ?><br/>
															<?php $datetime = $key['created_at']; 
															$time_elapsed = timeAgo($datetime);
															echo $time_elapsed;?></small></p>
												    </div>
												  </div>
												  <?php } ?>
										</div>
										
						</div>
						<?php } ?>
						
					</div>
				</div>


				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--  -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular News
								</h3>
							</div>
							<?php 
							$latestNewsDetails=GetLatestThreeNews($conn);
							?>
							<ul class="p-t-35">
								<?php foreach ($latestNewsDetails as $latestNewsDetail ) {
									$imageName = $latestNewsDetail['news_featuredimage'];
									$encryptedURL=encryptionFunction($latestNewsDetail['news_id']);
								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img src="../backend/newsFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestNewsDetail['news_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="newsDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php $categoryNames=getCategoryNameByCategoryId($conn,$latestNewsDetail['category_id']); 
                                $categoryName = implode("", $categoryNames);  ?>
												<?php echo $categoryName; ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?php
													$datetime = $latestNewsDetail['created_at'];
													$time_elapsed = timeAgo($datetime);
											 		echo $time_elapsed; 
												?>
												
											</span>
										</span>
									</div>
								</li>
								<?php
							}?>
							</ul>
						</div>

						<!-- Advertisement  -->
						<div class="container">
		<?php
								
								$specificArea = 'below_categoryNewsFirstSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					
				?>
					
				
	</div>
						
						<!--  -->
						<div class="p-t-50">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Stay Connected
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
										<span class="fab fa-facebook-f"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											6879 Fans
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Like
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
										<span class="fab fa-twitter"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 Followers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Follow
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
										<span class="fab fa-youtube"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 Subscribers
										</span>

										<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Subscribe
										</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="container">
							<?php
								
								$specificArea = 'below_categoryNewsSecondSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?> 
					</div>
					<div class="container">
							<?php
								
								$specificArea = 'below_categoryNewsThirdSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?> 
					</div>
					<div class="container">
							<?php
								
								$specificArea = 'below_categoryNewsFourthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?> 
					</div>
					<div class="container">
							<?php
								
								$specificArea = 'below_categoryNewsFifthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?> 
					</div>
					<div class="container">
							<?php
								
								$specificArea = 'below_categoryNewsSixthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  class="container" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
						<?php } ?> 
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr>
	<center><div style="width:95%">
		<?php
								
								$specificArea = 'above_categoryFooter';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
												<center><span style="color:grey;font-size:9px">Advertisment</span></center>
					<a href="#"><img  width="95%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"   alt=""></a><hr>
				<?php } 
					$specificArea = 'below_categoryTitleSecond';
					$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
					
					
				?>
					
				
	</div></center>
	<!-- Banner -->
	<!-- <div class="container m-b-15">
		<div class="flex-c-c">
			<a href="#">
				<img class="max-w-full" src="images/banner-01.jpg" alt="IMG">
			</a>
		</div>
	</div> -->

	<!-- Latest -->
	<section class="bg0 p-t-60 p-b-35" style="width:95%;margin-left:35px">
		<div >
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							Latest Articles
						</h3>
					</div>

					<div class="row p-t-35">
					<?php 
							$LatestSixArticle=selectLatestArticle($conn);
							// print_r($LatestSixArticle);
							foreach($LatestSixArticle as $key){
								$encryptedURL=encryptionFunction($key['article_id']);
							?>
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->
								
							<div class="m-b-45">
								<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="wrap-pic-w hov1 trans-03">
									<img src="../backend/articleFeaturedImage/<?php echo $key['article_featuredimage']; ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo $key['article_title']; ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo $key['article_author']; ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?php
												$datetime = $key['created_at'];
												$time_elapsed = timeAgo($datetime);
										 		echo $time_elapsed; 
											?>
										</span>
									</span>
								</div>
							</div>
							
						</div>
						<?php } ?>

						
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!-- Video -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-35">
								<h3 class="f1-m-2 cl3 tab01-title">
									Featured Video
								</h3>
							</div>

							<div>
								<div class="wrap-pic-w pos-relative">
									<img src="images/video-01.jpg" alt="IMG">

									<button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
										<span class="fab fa-youtube"></span>
									</button>
								</div>

								<div class="p-tb-16 p-rl-25 bg3">
									<h5 class="p-b-5">
										<a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
											Featured Video Here
										</a>
									</h5>

									<span class="cl15">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											by John Alvarado
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 18
										</span>
									</span>
								</div>
							</div>	
						</div>
							
						<!-- Subscribe -->
						<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
							<h5 class="f1-m-5 cl0 p-b-10">
								Subscribe
							</h5>

							<p class="f1-s-1 cl0 p-b-25">
								Get all latest content delivered to your email a few times a month.
							</p>

							<form class="size-a-9 pos-relative">
								<input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

								<button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
									<i class="fa fa-arrow-right"></i>
								</button>
							</form>
						</div>
						
						<!-- Tag -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
							<?php $result=getSubCategoriesDetails($conn);
// print_r($result);
foreach($result as $key){
	$encryptedURL=encryptionFunction($key['subcategory_id']);
?>
								<a href="subCategoryViewAll.php?ref=<?php echo $encryptedURL; ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									<?php echo $key['subcategory_name']; ?>
								</a>
								<?php } ?>
							</div>	
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php
	include "layouts/footer.php";
	?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
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