<?php
//Additional Security

require_once("secure.php");
?>

<!-- JavaCoffee.
	 Marketplace page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/909be56dda.js" crossorigin="anonymous"></script>
    <title>MarketPlace</title>

<style>

  /* Define the initial styles for the card */
.card {
  width: 300px;
  border: transparent ;
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  transition: transform 0.3s ease;
}

/* Add a hover effect to scale the card when hovered */
.card:hover {
  transform: scale(1.05);
}

.card img{
    border-radius: 10px;
}


/* Style the button inside the card */
.card button {
  background-color: #007BFF;
  border-radius: 10px;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Add a hover effect to the button */
.card button:hover {
  background-color: #0056b3;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, tr, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.product-card{
    
    max-width: 12em;
    background-color: white;
    padding: 1em;
    box-shadow: 0 5px 5px #e1e1e1;
    margin: 10px ;
   /* font-family: Arial, Helvetica, sans-serif;*/
}

.product-card img {
    max-width: 100%;
}

.product-card h4{
    font-size: 1.3em;
    margin: 0.5rem 0;
}

.product-card div {
    font-size: 1.2em;
    display: flex;
    justify-content: space-between;
}

.product-card button {
    background-color: #000;
    color: white;
    border: none;
    border-radius: 25%;
    width: 25px;
    height: 25px;
    font-size: 1em;
}

.product-card:hover {

    background-color: lightgray;
    color: white;
}

.product-card:hover  button {

color: lightgray;
background-color: white;

}

@media screen and (max-width: 720){
    .product-card{

        font-size: 0.9rem ;
    }
}

.flex-box {

    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}


.modern-form {
    width: 75%;
    height: 50% ;
    /*margin: 0 auto;*/
   margin-top: 50px;
   margin-bottom: 50px;
    padding: 20px;
   background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/* Style labels */
label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}
textarea{

    width: 95%;
}

/* Style input fields */
input[type="text"],
input[type="number"],
input[type="file"] {
    width: 95%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #9966cc;;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
}

/* Hover effect for the submit button */
input[type="submit"]:hover {
    background-color: lightblue;
}


/*SLIDE SHOW STYLING */


/* Hide the images by default */
.mySlides {
  display: none;
  border-radius: 10px;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: black;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

.review-us-container {
    max-width: 1200px;
    position: relative; 
    margin: 20px auto; /* Gives some space above and below */
    
    padding: 40px;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow-y: auto;
    width: 80vw; 
}

.mySlides  {
    width: 20rem;
    height: 28rem;
     
}

.review-us-container h2, h3{
  margin-top: 25px;
}

#descriptionArea{
  margin-top: 10px;
}



.centered-container {
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: center;
    margin: 30px;
}




</style>

</head>

<body>
<?php	
		include("navbar.php");
		?>
    
	<div class="main">

  <?php
  require_once("config.php");

$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
or die("Unable to connect to db");

if (isset($_REQUEST['selectedProductID'])  ) {
    $selectedProductID = $_REQUEST['selectedProductID'];
    //$_SESSION["selectedDigsIDRating"] = $selectedDigsID ;
    // Use this ID to fetch and display the desired data from the database
} else {
    echo "No selectedProductID received.";
}

$products = "SELECT product.ProductType, product.ProductName, product.ProductDescription, product.Price, productimages.images, userprofile.FirstName  
FROM g21p7126.product 
JOIN g21p7126.productimages 
ON productimages.ProductID = product.ProductID 
JOIN g21p7126.userprofile
ON product.UserProfileID = product.UserProfileID
WHERE product.ProductID = $selectedProductID AND product.UserProfileID = userprofile.UserProfileID; "; 



$result = mysqli_query($conn, $products) or die("Query error");



if (mysqli_num_rows($result) > 0) {  //display slideshow
     
    while ($row = mysqli_fetch_assoc($result)) {

?>

  <div class="review-us-container" style = "margin-top: 20px;">


  <!-- Full-width images with number text -->
  <div class="centered-container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
      <img src= "http://cs3-dev.ict.ru.ac.za/Practicals/JavaCoffee/Student-Hub/Images/<?php echo $row['images']; ?>" style="width:100%">
  </div>  
</div>





  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <!-- Image text -->




    

    <h2>Title: <?php echo $row["ProductName"]; ?></h2>
    <h3>Added by: <?php echo $row["FirstName"]; ?></h3>
<h3>Description:</h3>

<!--  PRINT  -->
<div id="descriptionArea"> <?php echo $row["ProductDescription"]; ?> <br></div> 


       

<?php
        } // end while
    } else {
        echo "<p>No results found for your search.</p>";
    }
    ?>
 


   
    </div> <!--End main-->
    </div>

<!--Comments-->



<!--Comments-->


    <script>
        let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;


  function handleStarRating(ratingInput, ratingValue) {
            const stars = document.querySelectorAll(`${ratingInput} i`);
            stars.forEach((star, index) => {
                star.addEventListener("click", () => {
                    // Set the hidden input value to the selected rating
                    document.querySelector(`input[name="${ratingInput.substring(1)}"]`).value = index + 1;
                    stars.forEach((s, i) => {
                        s.classList.toggle("active", i <= index);
                    });
                });
            });
        }

        // Call the function for cleanliness, maintenance, noise levels, and agent assistance ratings
        handleStarRating("#cleanliness", 3); // Initialize with a default rating of 3
        handleStarRating("#maintenance", 3); // Initialize with a default rating of 3
        handleStarRating("#noise_levels", 3); // Initialize with a default rating of 3
        handleStarRating("#agent_assistence", 3); // Initialize with a default rating of 3
}
    </script>



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
        
	</body>
</html>