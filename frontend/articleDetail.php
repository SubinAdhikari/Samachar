<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
$decryptID=decryptionFunction($ref);

$result=selectArticleFromId($conn,$decryptID);
//dump($result);

$article_visit=$result['article_views'];

$article_visit=(int)$article_visit + 1 ;
UpdateArticleVisitPage($conn,$article_visit,$decryptID);



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

								<!-- <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									<?php $comments1 = getAllArticleCommentsByArticleId($conn, $decryptID); ?>
									<?php echo count($comments1); ?> Comment
								</a> -->
							</div>

							<?php	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						// echo $actual_link;
						?>


							<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>

<div class="fb-share-button" data-href="<?php $actual_link; ?>" data-layout="box_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

							<?php
								$area = 'article_detailpage';
								$specificArea = 'below_articleTitle';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
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
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
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
								 
								// Driver Code  
								$search = "\n"; 
								$position = Search($search, $string);
								foreach($advertisement1 as $key){
								$image =$key['advertisement_image']; 
								
								
								$advertisementImageBelowFirstParaName="<br><img  src='../backend/advertisementImage/$image'

								 alt='Below Article Advertisement' width='100%'height='90px'>";
								}
								//$string = 'very '; 

								echo substr_replace( $string, $advertisementImageBelowFirstParaName."<hr>", $position , 0 );
 								?>
							
							</p>  

							<?php
								$area = 'article_detailpage';
								$specificArea = 'below_articleLastPara';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
							<!-- Tag -->
							<!-- <div class="flex-s-s p-t-12 p-b-15">
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
							</div> -->

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
								<div class="fb-share-button" data-href="<?php $actual_link; ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
									
									<div style="margin-left:5px">
								<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>	
									</div>

									<!-- <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-google-plus-g m-r-7"></i>
										Google+
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-pinterest-p m-r-7"></i>
										Pinterest
									</a> -->
								</div>
							</div>
						</div>
						<?php
								$area = 'article_detailpage';
								$specificArea = 'above_articleComment';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){
							?>
														<center><span style="color:grey;font-size:9px">Advertisment</span></center>
								<div style="height:90px;width:100%;border:1px black solid">
						
								<a href="#"><img width="100%" height="100%" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" 

								 alt="Below News Advertisement"></a>
								</div>

							  <?php } ?>
							  <br>
						<!-- Old Comment Section -->


						<!-- <div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Comments
							</h4>	
							<ul class="p-t-35">
								<?php
									$comments = getAllArticleCommentsByArticleId($conn, $decryptID);

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
								
							
						</div> -->
						<!-- End of old comment Section -->


						<!-- Leave a comment -->
						<!-- <div>
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
						</div> -->

<!-- FB COMMENT FROM HERE -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>

<?php	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						// echo $actual_link;
						?>

<div class="fb-comments" data-href="<?php echo $actual_link; ?>" data-numposts="5" data-width=""></div>
<!-- FB COMMENT ENDS HERE -->




					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">
						<!-- Article of Same Writer -->

						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									 Other Articles of<?php echo '<b><h3>'.$result['article_author'].'</h3></b>'; ?>
								</h3>
							</div>
							<?php

							$latestArticleDetails=GetArticlesOfSameWriter($conn,$result['article_author'],$result['article_id']);
							//dump($latestArticleDetails);
							
								# code...
							
							?>
							 <ul class="p-t-35">
								<?php foreach ($latestArticleDetails as $latestArticleDetail ) {
									$imageName = $latestArticleDetail['article_featuredimage'];
									$encryptedURL=encryptionFunction($latestArticleDetail['article_id']);
								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img src="../backend/articleFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestArticleDetail['article_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
						<!-- First Side Advertisement -->
						<?php 
						
						$specificArea = 'below_articleFirstSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

						

						<?php 
						
						$specificArea = 'below_articleSecondSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

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
									$encryptedURL=encryptionFunction($latestArticleDetail['article_id']);
								?>
								<li class="flex-wr-sb-s p-b-30">
									<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="size-w-10 wrap-pic-w hov1 trans-03">

										<img src="../backend/articleFeaturedImage/<?php echo $imageName; ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo $latestArticleDetail['article_title']; ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="articleDetail.php?ref=<?php echo $encryptedURL; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
						<?php 
						
						$specificArea = 'below_articleThirdSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						
						$specificArea = 'below_articleFourthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>

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
						<?php 
						
						$specificArea = 'below_articleFifthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						
						$specificArea = 'below_articleSixthSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
						<?php 
						
						$specificArea = 'below_articleSeventhSide';
								$advertisement1 = selectAllAdvertisementSpecificArea($conn,$area,$specificArea) ;
								
								foreach($advertisement1 as $key){?>
															<center><span style="color:grey;font-size:9px">Advertisment</span></center>
						<div class="flex-c-s p-t-8" style="border:1px black solid;">
							<a href="#">
								<img class="max-w-full" src="../backend/advertisementImage/<?php echo $key['advertisement_image']; ?>" alt="IMG">
							</a>
						</div>
						<?php }	?>
						<br>
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
	
if(insertArticleComment($conn, $_POST, $decryptID)){

    redirection("articleDetail.php?ref=$ref");
    
}}else{
    
    echo 'alert("Failed to create new comment ")';
    
}

}

?>
