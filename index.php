<?php

error_reporting(E_ALL & ~E_WARNING);

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
		<link rel="stylesheet" href="calendar.css">
		<link rel="stylesheet" href="styles.css"> <!--All pages-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			#H{
				background-color: aliceblue;
			}
		</style>
		<script>
			showProfile(){
				const profileToggle = document.getElementByClassName('profile_card');

			}
		</script>

	</head>

	<body>

		<?php	
			include("navbar.php");
		?>
		<?php
		// Check if the pop-up should be displayed (not shown before)
		if (!isset($_SESSION['popup_shown']) || $_SESSION['popup_shown'] === false) {
			// Display the pop-up
			?>
			<div class="location_overlay" id="locationPopup">
				<div class="location_popup" id="location_popup">
					<h2>Location Request</h2>
					<p>We ask for permission to use your location.</p>
					<button id="allowLocation">Allow</button>
					<button id="denyLocation">Deny</button>
				</div>
			</div>
			<?php

			// After displaying the pop-up, set the session variable to true
			$_SESSION['popup_shown'] = true;
		}
?>

		<div class="main">
			<div id="left-sidebar">
				<div id="profile" onclick="showProfile()"><img src="Images/icons/user.png" alt="user-icon"></div>
				<header onclick="showProfile()">Profile</header>
				
				<ul id="activity-links">
				  <li><button id="Todo"><span><img src="Images/icons/Todo.png" alt="todo-icon"></span>ToDo List</button></li>
				  <li><button id="Resources"><span><img src="Images/icons/resources.png" alt="resources-icon"></span>My Resources</button></li>
				  <li><button id="addListing"><span><img src="Images/icons/addListing.png" alt="resources-icon"></span>Add Listing</button></li>
				</ul>
			</div>
			<span><button id="leftSideBarMenu"><img src="Images/icons/menuClose.png" alt="close"></button></span>
			
			<div id="workspace">
				

				<div class="slideshow-container" id="slID">
					<span id="prev_btn" onclick="prevSlide()">
						<a class="prev" onclick="prevSlide()">&#10094;</a>
					</span>
				
					<div class="slide" id="ein1">
						<img src="Images/slideshow/ein1.jpg">
						<div class="text-container">
							<p>"Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid." - Einstein</p>
						</div>
					</div>
				
					<div class="slide" id="pythag2">
						<img src="Images/slideshow/pythag2.png">
						<div class="text-container">
							<p>“No one is free who has not obtained the empire of himself. No man is free who cannot command himself.” - Pythagoras</p>
						</div>
					</div>
				
					<div class="slide" id="socra1">
						<img src="Images/slideshow/socra1.jpg">
						<div class="text-container">
							<p>“The only true wisdom is in knowing you know nothing.” - Socrates</p>
						</div>
					</div>
				
					<div class="slide" id="plato1">
						<img src="Images/slideshow/plato1.jpg">
						<div class="text-container">
							<p>“A library of wisdom is more precious than all wealth, and all things that are desirable cannot be compared to it. Whoever, therefore, claims to be zealous of truth, of happiness, of wisdom or knowledge, must become a lover of books.” - Plato</p>
						</div>
					</div>
				
					<span id="nxt_btn" onclick="nextSlide()">
						<a class="next" onclick="nextSlide()">&#10095;</a>
					</span>
				</div>

				<div id="calendar-container" >
                    
                    <div class="calendar" >
						<h1>My Calendar</h1>
						<button id="eventsBtn"><img src="Images/icons/eventTab.png" alt="event"></button>
						
                        <header>
                            <div id="current-date">
                                September 2023
                            </div>
                            <div id="switchDates">
                                <span id="prev"><img src="Images/icons/calendarLeft.png" alt="left"></span>
                                <span id="next"><img src="Images/icons/calendarRight.png" alt="right"></span>
                            </div>
                        </header>
                        <div id="calendar-body">
                            <ul class="weeks">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="days">
                            </ul>
                        </div>
                    </div>
					
					<div id="events_reminder">
						<header>Events</header>
						<div id="eventsList">

						</div>
					</div>
				</div>
			</div>
			<div id="right-sidebar">
				<ul id="notif-bar">
					<li><a href="forum.php"><span>Forum</span> <img src="Images/icons/forum.png" alt="forum-icon"></a></li>
					<li><a href="marketplace.php"><span>Market Place</span> <img src="Images/icons/marketPlace.png" alt="marketPlace-icon"></a></li>
					<li><span>Settings</span><button id="Settings"><img src="Images/icons/settings.png" alt="settings-icon"></button></li>
				</ul>
			</div>
		</div>
		<div id="settings-wrapper">
			<header><button id="close-settings">Close</button></header>
			<ul id="settings-content">
				<li>
					<span>Change background theme color</span>
					<div id="themeDropDown">
						<ul id="themeColors">
							<li><label for="theme1">Default <input type="radio" id="theme1" name="theme"><div id="themeToolTip">Theme Preview</div></li>
							<li><label for="theme2">Dark Mode <input type="radio" id="theme2" name="theme"><div id="themeToolTip">Theme Preview</div></li>
						</ul>
						<button id="applyTheme">Submit</button>
					</div>
				</li>
			</ul>
		</div>
		<div class="cookies">
			<header>
				<h2>Cookies Consent</h2>
			</header>

			<div class="cookies_data">
				<p>This website uses cookies for browsing experience<a href="#"> Read more...</a></p>
			</div>

			<div class="accept_cookies">
				<button class="allow" id="acceptBtn">Accept</button>
				<button class="allow" id="declineBtn">Decline</button>
			</div>
		</div>
		<?php	
		include("footer.php");
		?>
		<script src="index.js"></script>
		<script src="calendar.js"></script>
		<script src="cookies.js"></script>
		<script src="theme_switcher.js"></script>
	</body>
</html>