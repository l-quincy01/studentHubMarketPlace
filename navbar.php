<nav>
	<div class="logo"> JavaCoffee</div>
	<div id="nav-links">
		<ul id="nav-bar">
			<li id="H"><a href="index.php">Home</a></li>
			<li><a href="https://ruconnected.ru.ac.za/">RUConnected</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="forum.php">Forum</a></li>
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
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="forum.php">Forum</a></li>
				<li><a href="marketplace.php">Market Place</a></li>
				<li><button id="signOut-btn">Sign Out</button></li>
			</ul>
		</div>
	</div>
</nav>
<script>

document.addEventListener('DOMContentLoaded', function() {
    var signOutButton = document.getElementById('signOut-btn');

    signOutButton.addEventListener('click', function() {
        window.location.href = 'logout.php';
    });
});

</script>