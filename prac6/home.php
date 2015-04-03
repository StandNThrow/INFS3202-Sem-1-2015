<!DOCTYPE html>

<?php
	session_start();
	if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
		header("Location: login_page.php");
	}
	
?>

<html>
	<head>
		<title>Overview Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/lightbox.css" rel="stylesheet" />
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/lightbox-2.6.min.js"></script>
		<script src="js/timerJavaScripts.js"></script>
		<script>
			window.onload = onLoadSequence();
		</script>		
	</head>


	<body>
		<div class="wrapper">
			<!--Start countdown timer to logout. Grab session countdown_timer with echo to be
			used as an arguement for the funciton -->
			<script>logout_timer(<?php echo $_SESSION['countdown_time'];?>);</script>
			<a href="admin_login.jsp">Go to Admin Page</a>
			<div class="site_title">
				<img id="left_image" src="images/flankimages1.jpg" alt="loginimage">
				<a href = "home.php">
					<img id="main_image" src="images/loginimage.jpg" alt="loginimage">
				</a>
				<img id="right_image" src="images/flankimages2.jpg" alt="loginimage">
			</div>

			<div id="login_details_tab">
				<a href="logout.php"><img src="images/logout.png" alt="logout image"></a>
				<h4>Logged in as 
					<?php
						echo $_SESSION['username']
					?>
				</h4>
				<a href="search_page.jsp"><h5>Custom Search |</h5></a>
				<a href="dynamic_search_page.html"><h5>| Quick Search |</h5></a>
				<a href="map_page.html"><h5>| Deal Location</h5></a>

			</div>


			<div id="current_promo_title">
				<img src="images/topdeals.png">
			</div>	



			<div id="current_promotion">
				<fieldset class="image_fieldset">
					<legend id="legend1">Retrieving info....</legend>
					<a href="promo1.jsp"><img src="images/promo1.jpg" alt="promo"></a>
				</fieldset>

				<fieldset class="image_fieldset">
					<legend id="legend2">Retrieving info....</legend>
					<a href="promo2.jsp"><img src="images/promo2.jpg" alt="promo"></a>
				</fieldset>

				<fieldset class="image_fieldset">
					<legend id="legend3">Retrieving info....</legend>
					<a href="promo3.jsp"><img src="images/promo3.jpg" alt="promo"></a>
				</fieldset>

				<fieldset class="image_fieldset">
					<legend id="legend4">Retrieving info....</legend>
					<a href="promo4.jsp"><img src="images/promo4.jpg" alt="promo"></a>
				</fieldset>

				<fieldset class="image_fieldset">
					<legend id="legend5">Retrieving info....</legend>
					<a href="promo5.jsp"><img src="images/promo5.jpg" alt="promo"></a>
				</fieldset>

				<fieldset class="image_fieldset">
					<legend id="legend6">Retrieving info....</legend>
					<a href="promo6.jsp"><img src="images/promo6.jpg" alt="promo"></a>
				</fieldset>
			</div>

			<h1>Browse Popular Eateries</h1>

			<div class="overview_div">
				<div class="header_div">
					<h1>Restaurants</h1>
					<a href="images/rest1.jpg" data-lightbox="restaurants"><h1>Gallery</h1></a>
				</div>	

				<div class="my_list">
					<ul>
						<li>
							<div class="list_items">
								<a href="images/rest1.jpg" data-lightbox="restaurants"><img src="images/rest1.jpg" alt="restaurants"></a>
								<p>
									The Steak House<br>
									04-12435677<br> 
									Overall excellent place to eat steak!
								</p>
							</div>
						</li>	

						<li>
							<div class="list_items">
								<a href="images/rest2.jpg" data-lightbox="restaurants"><img src="images/rest2.jpg" alt="restaurants"></a>
								<p>
									Pancake Shack<br>
									04-73920056<br> 
									Customers find the pancakes dangerously delectable.
								</p>						
							</div>
						</li>

						<li>
							<div class="show_more">
								<a href="show_more_restaurants.php" target="_blank"><h2>show more</h2></a>
							</div>
						</li>
					</ul>
				</div>
			</div>


			<div class="overview_div">
				<div class="header_div">
					<h1>Cafes</h1>
					<a href="images/cin1.jpg" data-lightbox="cinemas"><h1>Gallery</h1></a>
				</div>	

				<div class="my_list">
					<ul>
						<li>
							<div class="list_items">
								<a href="images/cin1.jpg" data-lightbox="cinemas"><img src="images/cin1.jpg" alt="restaurants"></a>
								<p>
									Cineplus Theaters<br>
									04-12488277<br> 
									Popular amongst youths for their screening of popular flicks
								</p>						
							</div>
						</li>	

						<li>
							<div class="list_items">
								<a href="images/cin2.jpg" data-lightbox="cinemas"><img src="images/cin2.jpg" alt="restaurants"></a>
								<p>
									Hawthorne Cinemas<br>
									04-25334677<br> 
									Specialises in vintage films and oldies. Sure to attract elderly people!
								</p>						
							</div>
						</li>

						<li>
							<div class="show_more">
								<a href="show_more_cinemas.php" target="_blank"><h2>show more</h2></a>
							</div>
						</li>	
					</ul>
				</div>
			</div>




			<div class="overview_div">
				<div class="header_div">
					<h1>Bars</h1>
					<a href="images/park1.jpg" data-lightbox="parks"><h1>Gallery</h1></a>
				</div>	

				<div class="my_list">
					<ul>
						<li>
							<div class="list_items">
								<a href="images/park1.jpg" data-lightbox="parks"><img src="images/park1.jpg" alt="restaurants"></a>
								<p>
									Racoon Park<br>
									04-77654677<br> 
									Feed the birds and kick back and relax in this tranquil park
								</p>						
							</div>
						</li>	

						<li>
							<div class="list_items">
								<a href="images/park2.jpg" data-lightbox="parks"><img src="images/park2.jpg" alt="restaurants"></a>
								<p>
									Toonile Park<br>
									04-76835677<br> 
									Let your hyperactive kids run wild in this large park that is sure to get them lost.
								</p>					
							</div>
						</li>

						<li>
							<div class="show_more">
								<a href="show_more_parks.php" target="_blank"><h2>show more</h2></a>
							</div>
						</li>	
					</ul>
				</div>
			</div>
		</div>	
	</body>
</html>