
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
								Subin Adhikari<br>
									   Shreedhar Bhandari<br>
									   Abhishek Karki
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
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Exchange Rates
							</h5>
						</div>

						
	<link rel="stylesheet" type="text/css" href="//www.exchangerates.org.uk/widget/ER-SCRT2-css.php?w=200&nb=10&bdrc=E0E0E0&mbg=FFFFFF&fc=333333&tc=333333" media="screen" />
				<div id="erscrt2">
					<div id="erscrt2-widget">
					</div>
					<div id="erscrt2-infolink">
						<a rel="nofollow" href="//www.exchangerates.org.uk/Nepalese-Rupee-NPR-currency-table.html" target="_new" ><img src='https://www.exchangerates.org.uk/widget/logo-333333.png' alt='ExchangeRates.org.uk'></a>
					</div>
						<script type="text/javascript">	
								var tz = 'userset';
								var w = '220';
								var mc = 'NPR';
								var nb = '10';
								var c1 = 'USD';
								var c2 = 'EUR';
								var c3 = 'AUD';
								var c4 = 'JPY';
								var c5 = 'INR';
								var c6 = 'CAD';
								var c7 = 'ZAR';
								var c8 = 'NZD';
								var c9 = 'SGD';
								var c10 = 'CNY';
								var t = 'Live Exchange Rates';
								var tc = '333333';
								var bdrc = 'E0E0E0';
								var mbg = 'FFFFFF';
								var fc = '333333';

								var ccHost = (("https:" == document.location.protocol) ? "https://www." : "http://www.");
								document.write(unescape("%3Cscript src='" + ccHost + "exchangerates.org.uk/widget/ER-SCRT2-1.php' type='text/javascript'%3E%3C/script%3E"));
						</script>
           		</div>
<!-- Simple Currency Rates Table END -->
<!-- Simple Currency Rates Table END -->
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<?php $result=getAllCategories($conn);
						?>
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>
						<?php
                          foreach($result as $key){ 
                          	?>
						<ul class="m-t--12">
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="category-02.php?ref=<?php echo $key['category_id'];  ?>" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									<?php echo $key['category_name']; ?>
								</a>
							</li>
						</ul>
					<?php } ?>
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