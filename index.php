<?php
include('front/menu.php');
?>
<!-- banner -->
<div id="home" class="w3ls-banner">
	<!-- banner-text -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="w3layouts-banner-top">

						<div class="container">
							<div class="agileits-banner-info">
								<h4>Gondar Resort</h4>
								<h3>WE KNOW WHAT YOU LOVE</h3>
								<p>WELCOME TO OUR HOTEL </p>
								<div class="agileits_w3layouts_more menu__item">
									<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top1">
						<div class="container">
							<div class="agileits-banner-info">
								<h4>Gondar Resort</h4>
								<h3>STAY WITH FRIENDS & FAMILIES</h3>
								<p>COME & ENJOY PRECIOUS MOMENT WITH US</p>
								<div class="agileits_w3layouts_more menu__item">
									<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top2">
						<div class="container">
							<div class="agileits-banner-info">
								<h4>Gondar Resort</h4>
								<h3>want luxurious vacation?</h3>
								<p>Get accommodation today</p>
								<div class="agileits_w3layouts_more menu__item">
									<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
		<!--banner Slider starts Here-->
	</div>
	<div class="thim-click-to-bottom">
		<a href="#about" class="scroll">
			<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
		</a>
	</div>
</div>
<!-- //banner -->
<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<!-- Modal1 -->
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>SUN <span>RISE</span></h4>
				<img src="images/1.jpg" alt=" " class="img-responsive">
				<h5>We know what you love</h5>
				<p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes Star Hotel one of bests in its kind.Try our food menu, awesome services and friendly staff while you are here.</p>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->
<div id="availability-agileits">
	<div class="col-md-12 book-form-left-w3layouts">
		<a href="admin/reservation.php">
			<h2>ROOM RESERVATION</h2>
		</a>
	</div>

	<div class="clearfix"> </div>
</div>
<!-- banner-bottom -->
<div class="banner-bottom">
	<div class="container">
		<div class="agileits_banner_bottom">
			<h3><span>Experience a good stay, enjoy fantastic offers</span> Find our friendly welcoming reception</h3>
		</div>
		<div class="w3ls_banner_bottom_grids">
			<ul class="cbp-ig-grid">
				<li>
					<div class="w3_grid_effect">
						<span class="cbp-ig-icon w3_road"></span>
						<h4 class="cbp-ig-title">MASTER BEDROOMS</h4>
						<span class="cbp-ig-category">SUN RISE</span>
					</div>
				</li>
				<li>
					<div class="w3_grid_effect">
						<span class="cbp-ig-icon w3_cube"></span>
						<h4 class="cbp-ig-title">SEA VIEW BALCONY</h4>
						<span class="cbp-ig-category">SUN RISE</span>
					</div>
				</li>
				<li>
					<div class="w3_grid_effect">
						<span class="cbp-ig-icon w3_users"></span>
						<h4 class="cbp-ig-title">LARGE CAFE</h4>
						<span class="cbp-ig-category">SUN RISE</span>
					</div>
				</li>
				<li>
					<div class="w3_grid_effect">
						<span class="cbp-ig-icon w3_ticket"></span>
						<h4 class="cbp-ig-title">WIFI COVERAGE</h4>
						<span class="cbp-ig-category">SUN RISE</span>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php
include('front/footer.php');
?>
<!--/footer -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- /contact form -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
<script>
	$(function() {
		$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
	});
</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="css/swipebox.css">
<script src="js/jquery.swipebox.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$(".swipebox").swipebox();
	});
</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider) {
				$('body').removeClass('loading');
			}
		});
	});
</script>
<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
<script>
	// You can also use "$(window).load(function() {"
	$(function() {
		// Slideshow 4
		$("#slider4").responsiveSlides({
			auto: true,
			pager: true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			before: function() {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function() {
				$('.events').append("<li>after event fired.</li>");
			}
		});

	});
</script>
<!--search-bar-->
<script src="js/main.js"></script>
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function() {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true, // 100% fit in a container
			closed: 'accordion', // Start closed if in accordion view
			activate: function(event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
		$('#verticalTab').easyResponsiveTabs({
			type: 'vertical',
			width: 'auto',
			fit: true
		});
	});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/
		$().UItoTop({
			easingType: 'easeOutQuart'
		});
	});
</script>

<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>

</html>