<?php
include 'layouts/header.php';




?>


	<!-- Breadcrumb -->
	<center><div style="width:95%">
		
	</div></center>

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10" style="width:95%;margin-left:35px">
		<div >
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">												
						<div class="p-b-70">							
<iframe style="border: none; height: 670px; overflow: hidden; width: 100%;" src="https://unicode.toolsnepal.com" frameborder="0" scrolling="no"></iframe>
							
							
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
							  
						<!-- Old Comment Section -->


						
						<!-- End of old comment Section -->


						<!-- Leave a comment -->
						
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">						
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

						<!-- Article of Same Writer -->

						

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
