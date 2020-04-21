<?php
include "layouts/header.php"
?>

	<!-- Headline -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8">
					Trending Now:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Abhishek Karki
					</span>
					
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Subin Adhikari
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Shreedhar Bhandari
					</span>
				</span>
			</div>
			<form method="POST" action="searchResult.php">
			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" name="searchBtn">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
			</form>
		</div>
	</div>
		 

	<div class="container">
					
					<a href="#"><img  class="container" src="../backend/advertisementImage/Nepal-Bank-New-Banne.gif"   alt=""></a><hr>
					<a href="#"><img class="container" src="../backend/advertisementImage/Sajhapost-1225x100-1.gif"   alt=""></a><hr>
	</div>

	<?php
	$bannerNews=GetLatestThreeBannerNews($conn);
	// print_r($bannerNews);
	?>
<?php foreach($bannerNews as $key){ ?>
	<a href="newsDetail.php?ref=<?php echo $key['news_id'];?>">
	<div class="container" style="background-color: GhostWhite;">
				<div>
				<h2 style="color:black;font-size:40px;"><strong><center>
					<?php echo $key['news_title']; ?></center></strong></h2>
				</div>
				<div>
				<span style="color:black;font-size:20px;"><strong><center><?php echo $key['news_writtenby']; ?></center></strong></span>
				</div>
				<figure> <img width="100%" height="581" src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>"> </figure> 
				<p>
				<strong style="color:black">
				<?php
				$FullNews=$key['news_deails'];
                $subStrNews= substr($FullNews,127,400);
				echo $subStrNews;
				echo ' Read more';
                ?>
              
            
				 </strong></p>
				
	</div>
	</a>
	<br>
	<div class="container">
					
					<a href="#"><img  class="container" src="../backend/advertisementImage/GO__1200-X-150-copy.jpg"   alt=""></a><hr>
				
	</div>
	
	<br>
<?php }?>
	

<!-- 
				<div class="container" style="background-color: GhostWhite;">
				<div >
				<h2 style="color:black;font-size:40px;"><strong><center>बार्सिलोना शहरमा शवगृहको दर्दनाक दृश्य<center><strong></h2>
				<div >
				<span style="color:black;font-size:20px;"><strong><center>हिमाल कोइराला<center><strong></span>
				</div>
				<figure> <img width="100%" height="581" src="../backend/newsFeaturedImage/5e8b2bb7b53e11.69179662.jpg"  alt=""  > </figure> 
				विगत १६ वर्षदेखि शवको अन्त्येष्टी गर्ने काममा संलग्न जोर्डी फर्नान्डेजलाई अहिलेको जस्तो कहालीलाग्दो अवस्था देख्नुपर्ला भन्ने लागेकै थिएन । बार्सिलोना शहरमा रहेको उनको अन्त्येष्टी गृह अहिले विरक्तलाग्दो छ । अन्त्येष्टीका क्रममा शवलाई ‘शान्ति प्रदान गर्नु’ उनको मुख्य जिम्मेवारी हो । स्पष्ट भन्दा उनको काम अन्त्येष्टी </p>
				</div>
</div> --><br><br>

	<!-- Feature post -->
	<?php
	$latestNewsDetails=GetLatestNews($conn);
	// print_r($latestNewsDetails);
	?>
	<section class="bg0">
		<div class="container">
		<?php foreach($latestNewsDetails as $key){ ?>
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
						<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<!-- <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								National
							</a> -->

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									<?php echo $key['news_title']; ?>
								</a>
							</h3>

							<!-- <span class="how1-child2">
								<span class="f1-s-4 cl11">
									Abhishek Karki
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
								<?php echo $key['created_at']; ?>
								</span>
							</span> -->
						</div>
					</div>
				</div>
<?php } ?>



<?php 
$secondLastNews=GetSecondLastNews($conn); 
// print_r($secondLastNews);
foreach($secondLastNews as $key){

?>
				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
								<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									<!-- <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										Entertainment
									</a> -->

									<h3 class="how1-child2 m-t-14">
										<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
											<?php echo $key['news_title']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
						<?php } ?>



<?php $thirdLastNews=GetThirdLastNews($conn);
foreach($thirdLastNews as $key){
// print_r($thirdLastNews);
?>
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
								<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<!-- <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										Life Style
									</a> -->

									<h3 class="how1-child2 m-t-14">
										<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											<?php echo $key['news_title']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
						<?php } ?>
						
<?php 
$forthLastNews=GetForthLastNews($conn);
// print_r($forthLastNews);
foreach($forthLastNews as $key){
?>
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>);">
								<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<!-- <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										Sport
									</a> -->

									<h3 class="how1-child2 m-t-14">
										<a href="newsDetail.php?ref=<?php echo $key['news_id']; ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo $key['news_title']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-70">
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
								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="newsDetail.php?ref=<?php echo $latestNewsDetail['news_id']; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img src="../backend/newsFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="newsDetail.php?ref=<?php echo $latestNewsDetail['news_id']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestNewsDetail['news_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="newsDetail.php?ref=<?php echo $latestNewsDetail['news_id']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php $categoryNames=getCategoryNameByCategoryId($conn,$latestNewsDetail['category_id']); 
                                $categoryName = implode("", $categoryNames);  ?>
												<?php echo $categoryName; ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?php echo $latestNewsDetail['created_at']; ?>
											</span>
										</span>
									</div>
								</li>
								<?php
							}?>
							</ul>
						</div> 

						<!--  -->
						<?php foreach($Advertisement_bannerSilver as $key) {?>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						
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
						<?php foreach($Advertisement_bannerSilver as $key) {?>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Banner -->
	<?php foreach($Advertisement_bannerBronze as $key){ ?>
	<div class="container" style="border:1px black solid;">
		<div class="flex-c-c">
			<a href="#" >
				<!-- <img class="max-w-full" src="images/banner-01.jpg" alt="IMG"> -->
				<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>"  alt="IMG"> 
			</a>
		</div>
	</div>
	<?php } ?>

	<!-- Latest -->
	<section class="bg0 p-t-60 p-b-35">
		<div class="container">
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
							?>
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->
								
							<div class="m-b-45">
								<a href="articleDetail.php?ref=<?php echo $key['article_id']; ?>" class="wrap-pic-w hov1 trans-03">
									<img src="../backend/articleFeaturedImage/<?php echo $key['article_featuredimage']; ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="articleDetail.php?ref=<?php echo $key['article_id']; ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
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
											Feb 18
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
?>
								<a href="subCategoryViewAll.php?ref=<?php echo $key['subcategory_id']; ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
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