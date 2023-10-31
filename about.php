<?php
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
		<title>About
		</title>
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="about.css">
		<style>
			#H{
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
	<?php	
		include("navbar.php");
		?>

		<div class="main">
			<div class="profileContainer">
				<div class="profile-details">
					<header>B. Sc. Computer Science and Applied Mathematics, Rhodes University (SA)</header>
					<!--Description-->
					<p>
					Jaydin Fischat is the founder of StuHubbie!.
					<br /> 
					He is currently in his final year of his studies while running StuHubbie!.
					<br />
					His set of skills are Proficiency in one or more programming languages such as Python, Java, C++ and JavaScript.
					<br />
						<strong> Get in touch with him via: </strong>
					</p>
					
					<ul>
						<li><a href="https://www.instagram.com/"> <!-- Absolute URL to an external website -->
							<img src="../Student-Hub/Images/instagram.png" alt="jaydin's Instagram">
						</a></li>
						<li><a href="https://www.twitter.com/">
							<img src="../Student-Hub/Images/X.png" alt="Jaydin's Twitter">
						</a></li>
						<li><a href="mailto:g21f7853@campus.ru.ac.za">JFischat@StuHubbie.com</a></li>
					</ul>
				</div>
				<div class="profile-image">
					<img src="about_files/member_pics/jaydin.jpg" alt="Jaydin Fischat's picture">
					<h6>Jaydin Fischat, Founder</h6>
				</div>
			</div>
			<div class="profileContainer">
				<div class="profile-image">
					<img src="about_files/member_pics/uviwe.jpg" alt="Uviwe Jumba's picture">
					<h6>Uviwe Jumba, Co-Founder</h6>
				</div>
				<div class="profile-details">
					<h4> B. Sc. Computer Science and Applied Mathematics, Rhodes University (SA) </h4>
					<!--Description-->
					<p>
					Uviwe Jumba is the co-founder of StuHubbie!.
					<br /> 
					He is currently in his final year of his studies while running StuHubbie!.
					<br />
					His set of skills are DevOps and CI/CD: Understanding of continuous integration and continuous deployment (CI/CD) processes, as well as tools like Jenkins, Docker, Kubernetes, and AWS/Azure/GCP services.
					<br />
						<strong> Get in touch with him via: </strong>
					</p>
					
					<ul>
						<li><a href="https://www.instagram.com/"> <!-- Absolute URL to an external website -->
							<img src="../Student-Hub/Images/instagram.png" alt="Uviwe's Instagram">
						</a></li>
						<li><a href="https://www.twitter.com/">
							<img src="../Student-Hub/Images/X.png" alt="Uviwe's Twitter">
						</a></li>
						<li><a href="mailto:g20j1104@campus.ru.ac.za">UJumba@StuHubbie.com</a></li>
					</ul>
				</div>
				
				
			</div>
			<div class="profileContainer">
				<div class="profile-details">
					<h4> B. Sc. Computer Science and Information Systems, Rhodes University (SA) </h4>
					<!--Description-->
					<p>
					Lesego Pitsi is the Head of IT at StuHubbie!.
					<br /> 
					He is currently in his final year of his studies while running StuHubbie!.
					<br />
					His set of skills are Data Structures and Algorithms: Strong understanding of data structures (e.g., arrays, lists, trees) and algorithms to optimize code for performance and efficiency
					<br />
						<strong> Get in touch with him via: </strong>
					</p>
					
					<ul>
						<li><a href="https://www.instagram.com/"> <!-- Absolute URL to an external website -->
							<img src="../Student-Hub/Images/instagram.png" alt="Lesego's Instagram">
						</a></li>
						<li><a href="https://www.twitter.com/">
							<img src="../Student-Hub/Images/X.png" alt="Lesego's Twitter">
						</a></li>
						<li><a href="mailto:g21f7853@campus.ru.ac.za">	LPitsi@StuHubbie.com</a></li>
					</ul>
				</div>
				<div class="profile-image">
					<img src="about_files/member_pics/lesego.jpg" alt="Lesego Pitsi's picture">
					<h6>  Lesego Pitsi, Head of IT </h6>
				</div>
			</div>
			<div class="profileContainer">
				<div class="profile-image">
					<img src="about_files/member_pics/ntsakisi.jpg" alt="Ntsakisi Ritshuri's picture">
					<h6> Ntsakisi Ritshuri, Head of Security </h6>
				</div>
				<div class="profile-details">
					<h4> B. Sc. Computer Science and Applied Mathematics, Rhodes University (SA) </h4>
					<!--Description-->
					<p>
					Ntsakisi Ritshuri is the Head of Security at StuHubbie!.
					<br /> 
					She is currently in his final year of his studies while running StuHubbie!.
					<br />
					Her set of skills are Security: Awareness of software security principles and best practices to prevent vulnerabilities and threats..
					<br />
						<strong> Get in touch with her via: </strong>
					</p>
					
					<ul>
						<li><a href="https://www.instagram.com/"> <!-- Absolute URL to an external website -->
							<img src="Images/instagram.png" alt="Ntsakisi's Instagram">
						</a></li>
						<li><a href="https://www.twitter.com/">
							<img src="Images/X.png" alt="Ntsakisi's Twitter">
						</a></li>
						<li><a href="mailto:g21f7853@campus.ru.ac.za">NRitshuri@StuHubbie.com</a></li>
					</ul>
				</div>
				
			</div>	
		</div>			
		<?php	
		include("footer.php");
		?>
		<script src="index.js"></script>
	</body>
</html>