
<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="index.html">
								<img class="max-s-full" src="images/icons/samachar.png" alt="LOGO">
							</a>
						</div>

						<div>
							<br>
							<p class="f1-s-1 cl11 p-b-16">
								Registration No: 1424/56789<br>
								MountTech Solutions<br>
								
							</p>

							<p class="f1-s-1 cl11 p-b-16">
								Any questions? Call us on 9808832123
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<i class="fab fa-facebook"></i>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<i class="fab fa-twitter-square"></i>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<i class="fab fa-google-plus-square"></i>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<i class="fab fa-youtube-square"></i>
								</a>
							</div>
						</div>
					</div>

					
					<div class="col-sm-6 col-lg-4 p-b-20">
						<?php $result=getAllCategories($conn);
						?>
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>
						<div class="flex-wr-s-s m-rl--5">
						<?php
                          foreach($result as $key){ 
							$encryptedURL=encryptionFunction($key['category_id']);
                          	?>
						
							
								<a href="category-02.php?ref=<?php echo $encryptedURL;  ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5" style="color:white;">
									<?php echo $key['category_name']; ?>
								</a>
							
						
					<?php } ?>
					</div>
					
				</div>
			</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © 2020

					<a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Website Made <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://mounttechsolutions.com" target="_blank">Mount Tech </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
			</div>
		</div>
	</footer>