<?php
include 'layouts/header.php';
$ref=$_GET['ref'];

$result=selectArticleFromId($conn,$ref);
//dump($result);

$article_visit=$result['article_views'];

$article_visit=(int)$article_visit + 1 ;
UpdateArticleVisitPage($conn,$article_visit,$ref);



?>


	<!-- Breadcrumb -->
	<center><div style="width:95%">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 

				</a>

				<a href="blog-list-01.html" class="breadcrumb-item f1-s-3 cl9">
					News 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					<?php echo $result['article_title']; ?>
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div></center>

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10" style="width:95%;margin-left:35px">
		<div >
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">												
						<div class="p-b-70">							
							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								<?php echo $result['article_title']; ?>
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										<?php echo $result['article_author']; ?>
									</a>

									<span class="m-rl-3">-</span>

									<span>
										<?php
												$datetime = $result['created_at'];
												$time_elapsed = timeAgo($datetime);
										 echo $time_elapsed; ?>
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									 <?php echo $article_visit; ?> Views
								</span>

								<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									<?php $comments1 = getAllArticleCommentsByArticleId($conn, $ref); ?>
									<?php echo count($comments1); ?> Comment
								</a>
							</div>
							<?php
								$area = 'article_detailpage';
								$specificArea = 'below_articleTitle';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 


								 alt="Below Article Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>

							<div class="wrap-pic-max-w p-b-30">
								<?php 
								$imageName = $result['article_featuredimage'];
								
								?>
								<img src="../backend/articleFeaturedImage/<?php echo $imageName; ?>" 
								height="400px"
								width ="500px" 
								alt="IMG">

								
							</div>
							<?php
								$area = 'article_detailpage';
								$specificArea = 'below_articlePhoto';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%"  src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 
									

								 alt="Below Article Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
							<p class="f1-s-11 cl6 p-b-25" style="font-size:18px;">
								
								<?php 
								$area = 'article_detailpage';
								$specificArea = 'below_articleFirstPara';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;

								$string = $result['article_details'];

								function Search($search, $string){ 
								    $position = strpos($string, $search, 0);   
								    if (is_numeric($position)){ 
								        return  $position; 
								    } 
								    else{ 
								        return "Not Found"; 
								    } 
								} 
								$a="";  
								// Driver Code  
								$search = "\n"; 
								$position = Search($search, $string);
								foreach($advertisement1 as $key){
								$image =$key['advertisement_image']; 
								
								
								$a="<br><img  src='../backend/advertisementImage/$image'

								 alt='Below Article Advertisement' width='100%'height='90px'>";
								}
								//$string = 'very '; 

								echo substr_replace( $string, $a."<hr>", $position , 0 );
 								?>
							
							</p>  
								

							<!-- <p class="f1-s-11 cl6 p-b-25">
								Curabitur volutpat bibendum molestie. Vestibulum ornare gravida semper. Aliquam a dui suscipit, fringilla metus id, maximus leo. Vivamus sapien arcu, mollis eu pharetra vitae, condimentum in orci. Integer eu sodales dolor. Maecenas elementum arcu eu convallis rhoncus. Donec tortor sapien, euismod a faucibus eget, porttitor quis libero. 
							</p>

							<p class="f1-s-11 cl6 p-b-25">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sit amet est vel orci luctus sollicitudin. Duis eleifend vestibulum justo, varius semper lacus condimentum dictum. Donec pulvinar a magna ut malesuada. In posuere felis diam, vel sodales metus accumsan in. Duis viverra dui eu pharetra pellentesque. Donec a eros leo. Quisque sed ligula vitae lorem efficitur faucibus. Praesent sit amet imperdiet ante. Nulla id tellus auctor, dictum libero a, malesuada nisi. Nulla in porta nibh, id vestibulum ipsum. Praesent dapibus tempus erat quis aliquet. Donec ac purus id sapien condimentum feugiat.
							</p>

							<p class="f1-s-11 cl6 p-b-25">
								Praesent vel mi bibendum, finibus leo ac, condimentum arcu. Pellentesque sem ex, tristique sit amet suscipit in, mattis imperdiet enim. Integer tempus justo nec velit fringilla, eget eleifend neque blandit. Sed tempor magna sed congue auctor. Mauris eu turpis eget tortor ultricies elementum. Phasellus vel placerat orci, a venenatis justo. Phasellus faucibus venenatis nisl vitae vestibulum. Praesent id nibh arcu. Vivamus sagittis accumsan felis, quis vulputate
							</p> -->
							<?php
								$area = 'article_detailpage';
								$specificArea = 'below_articleLastPara';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Streetstyle
									</a>

									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Crafts
									</a>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-google-plus-g m-r-7"></i>
										Google+
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-pinterest-p m-r-7"></i>
										Pinterest
									</a>
								</div>
							</div>
						</div>
						<?php
								$area = 'article_detailpage';
								$specificArea = 'above_articleComment';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
						<!-- Old Comment Section -->


						<div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Comments
							</h4>	
							<ul class="p-t-35">
								<?php
									$comments = getAllArticleCommentsByArticleId($conn, $ref);

									foreach ($comments as $comment ) {
										# code...
										if ($comment['is_active']=='active') {
											# code...
										
									
							
								?>
								<li class="flex-wr-sb-s p-b-30">									
									<div class="size-w-11 row">
										<div class="col-md-2 col-sm-2 hidden-xs">
						              <figure class="thumbnail">
						                <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" height="50px" width="50px" />						                
						              </figure>
						            </div>
						            <div class="col-md-10 col-sm-10" style="border: 1px solid #aaa;padding: 10px;">
										<h5 class="p-b-4">
												<b><?php echo $comment['name'];?></b>
											
										</h5>

										<span class="cl8 txt-center p-b-24">
											
												<?php echo $comment['comment'];?>
											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?php $comdatetime = $comment['postingDate'];
												$time_elapsed = timeAgo($comdatetime);
												echo $time_elapsed; ?>
											</span>
										</span>
									</div>
									</div>
								</li>
							<?php }} ?>
								
							</ul>
								
							
						</div>
						<!-- End of old comment Section -->


						<!-- Leave a comment -->
						<div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Leave a Comment
							</h4>

							<p class="f1-s-13 cl8 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							<form method="POST" accept-charset="utf-8">
								<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="comment" placeholder="Comment..."></textarea>

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="email" name="email" placeholder="Email*">

								
								<input  class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10" type="submit" name="submitBtn" value="Post Comment"/>									 								
							</form>
						</div>
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">						
						<!-- Category -->
						<div class="p-b-60">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Category
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Fashion
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Beauty
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Street Style
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Life Style
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										DIY & Crafts
									</a>
								</li>
							</ul>
						</div>

						<!-- Archive -->
						<div class="p-b-37">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Archive
								</h3>
							</div>

							<ul class="p-t-32">
								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											July 2018
										</span>

										<span>
											(9)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											June 2018
										</span>

										<span>
											(39)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											May 2018
										</span>

										<span>
											(29)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											April  2018
										</span>

										<span>
											(35)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											March 2018
										</span>

										<span>
											(22)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											February 2018
										</span>

										<span>
											(32)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											January 2018
										</span>

										<span>
											(21)
										</span>
									</a>
								</li>

								<li class="p-rl-4 p-b-19">
									<a href="#" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
										<span>
											December 2017
										</span>

										<span>
											(26)
										</span>
									</a>
								</li>
							</ul>
						</div>

						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular Article
								</h3>
							</div>
							<?php
							$latestArticleDetails=GetLatestThreeArticles($conn);
							// dump($latestNewsDetails);
							
								# code...
							
							?>
							<ul class="p-t-35">
								<?php foreach ($latestArticleDetails as $latestArticleDetail ) {
									$imageName = $latestArticleDetail['article_featuredimage'];
								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="articleDetail.php?ref=<?php echo $latestArticleDetail['article_id']; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img src="../backend/articleFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="articleDetail.php?ref=<?php echo $latestArticleDetail['article_id']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestArticleDetail['article_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="articleDetail.php?ref=<?php echo $latestArticleDetail['article_id']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo $latestArticleDetail['article_author']; ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?php
												$comdatetime = $latestArticleDetail['created_at'];
												$time_elapsed = timeAgo($comdatetime);
												echo $time_elapsed; ?>
											</span>
										</span>
									</div>
								</li>
								<?php
							}?>
							</ul>
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
<?php
if(isset($_POST['submitBtn'])){
	
if (!empty($_POST['name'])) {
		# code...
	
if(insertArticleComment($conn, $_POST, $ref)){

    redirection("articleDetail.php?ref=$ref");
    
}}else{
    
    echo 'alert("Failed to create new comment ")';
    
}

}

?>
