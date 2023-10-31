<!-- JavaCoffee.
	 Index page -->

	 <?php 
	   session_start() ;
	   //Additional Security
header("Content-Security-Policy: script-src 'self' http://cs3-dev.ict.ru.ac.za/");
require_once("secure.php");
	 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta lang="eng">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Welcome to StuHubbie
		</title>
		<link rel="stylesheet" href="index.css">
		<link rel="stylesheet" href="styles.css"> <!--All pages-->
		<link rel="stylesheet" href="scripts/CSS/styling/slide-style.css">
		<script src="scripts/JS/slideLogic.js"></script>
		<script src="cookies.js" defer></script>

		<STYle>
			#nav-bar #H{
				background-color: aliceblue;
			}
		</STYle>

	</head>
	<body onload="showSlide(0)">

		<nav>
			<div class="logo"> JavaCoffee</div>
			<div id="nav-links">
				<ul id="nav-bar">
					<li id="H"><a href="index.php">Home</a></li>
					<li><a href="https://ruconnected.ru.ac.za/">RUConnected</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="forum.html">Forum</a></li>
					<li><a href="marketplace.php">Market Place</a></li>
				</ul>
				
				
				<button id="signOut-btn">Signout</button>

			</div>
			<div id="dropDownMenu">
				<button id="dropDownBtn">&#9776;</button>
				<div id="dropDownContents">
					<ul id="mobileNav">
						<li><a href="index.php">Home</a></li>
						<li><a href="https://ruconnected.ru.ac.za/">RUConnected</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="forum.html">Forum</a></li>
						<li><a href="marketplace.php">Market Place</a></li>
						<li><button id="signOut-btn">Signout</button></li>
					</ul>
				</div>
			</div>
		
		</nav>

		<div class="location_overlay" id="locationPopup">
			<div class="location_popup" id="location_popup">
				<h2>Location Request</h2>
				<p>We ask for permission to use your location.</p>
				<button id="allowLocation">Allow</button>
				<button id="denyLocation">Deny</button>
			</div>
		</div>
		<div class="main">
			<div id="left-sidebar">
				<div id="profile"><img src="Images/icons/user.png" alt="user-icon"></div>
				<header>Profile</header>
				
				<ul id="activity-links">
				  <li><button id="Calendar"><span><img src="Images/icons/calendar.png" alt="calendar-icon"></span>Calendar</button></li>
				  <li><button id="Todo"><span><img src="Images/icons/Todo.png" alt="todo-icon"></span>ToDo List</button></li>
				  <li><button id="Resources"><span><img src="Images/icons/resources.png" alt="resources-icon"></span>My Resources</button></li>
				  <li><button id="addListing"><span><img src="Images/icons/addListing.png" alt="add-Listing"></span>Add listing</button></li>
				  
				</ul>
			</div>
			<span><button id="leftSideBarMenu">&#9776;</button></span>
			



			

			</div>
			
		<footer>
			<div class="footer-content">
				<h3>Get in touch with us</h3>
				<ul class="social-links">
					<li><a href="#"><image src="Images/facebook.png" alt="Facebook logo"></a></li>
					<li><a href="#"><image src="Images/instagram.png" alt="Instagram log"></a></li>
					<li><a href="#"><image src="Images/phone.png" alt="Phone logo"><a href="tel: 0123456789"></a></li>
				</ul>
				<p> 
					123 West Ave, Coffee Beans, PO 456 <br/>
					<span><image class="logo" src="Images/copyright.png" alt="CopyRight">2023 JavaCoffee
					| All rights reserved</span>
				</p>
			</div>
		</footer>
		<script src="index.js"></script>
	</body>
</html>