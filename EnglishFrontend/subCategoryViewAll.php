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
<center>	<div style="width:95%">
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
	</div></center>

	<!-- Page heading -->
	<?php 
	$subcategoryName=SelectSubCategoryNameFromId($conn,$subcategory_id);
    // print_r($subcategoryName);
	foreach($subcategoryName as $key){
		?>
	<div style="width:95%;margin-left:45px">
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
		<div style="width:95%;margin-left:35px">
			
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
	<section class="bg0 p-t-70" style="width:95%;margin-left:35px">
		<div>
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
								<h1 class="f1-m-2 cl19 tab01-title" style="font-size:30px; color:green">
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
								<a href="category-02.php?ref=<?php echo $key['category_id']; ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
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
									
									?>
												  <div class="card" style="margin:3px;border-radius:20px">
												  	<a href="newsDetail.php?ref=<?php echo $key['news_id'];?>" class="f1-s-5 cl3 hov-cl10 trans-03" >
												    <img src="../backend/newsFeaturedImage/<?php echo $key['news_featuredimage']; ?>" style="border-radius:20px" class="card-img-top" alt="...">
												</a>
												    <div class="card-body">
												      <h5><a href="newsDetail.php?ref=<?php echo $key['news_id'];?>" class="f1-s-5 cl3 hov-cl10 trans-03" class="card-title" style="font-size:20px; color:black" ><?php echo $key['news_title']; ?></a></h5>
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
												<?php $datetime = $latestNewsDetail['created_at']; 

										
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

						<!--  -->
						<!-- ADVERTISMENT HERE -->
						
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
						<!-- ADVERTISMENT HERE -->
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