<?php
//Additional Security
header("Content-Security-Policy: script-src 'self' http://cs3-dev.ict.ru.ac.za/");
require_once("secure.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
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
    
    width: 16rem;
    height: 23rem;
    background-color: white;
    padding: 1em;
    box-shadow: 0 5px 5px #e1e1e1;
    margin: 10px ;
   /* font-family: Arial, Helvetica, sans-serif;*/
}

.product-card img {
    width: 10rem;
    height: 12rem;
    
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

.product-card span {
   
    font-size: 0.75rem;
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

        font-size: 1rem ;
    }
}

.flex-box {

    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

            .search-bar {
            margin-top: 20px;
            background-color: hsl(252, 30%, 95%);
            border-radius: 2rem;
            padding: 0.6rem 1rem;
            

        }

        .search-bar input[type ="search"] {
            background: transparent;
            width: 30vw;
            margin-left: 1rem;
            font-size: 0.9rem ;
            color: hsl(252, 30%, 17%);
            border: 0 ;
        }


        input[type="submit"] {
    background-color: rgb(195, 125, 228);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
}
.cart {
    border: 1px solid #ccc;
    padding: 20px;
    width: 300px;
    margin: 0;
    background-color: hsl(252, 30%, 95%);
    border-radius: 5px;
}


h1 {
    font-size: 24px;
    text-align: center;
    margin: 0 0 20px;
	font-family: cursive;
}

.row {
    display: flex;
    justify-content: space-between;
}

button {
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

button#clear {
    background-color:rgb(195, 125, 228);
    color: #fff;
}

button#checkout {
    background-color: purple ;
    color: #fff;
}

button.disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

#cartItems {
    margin-top: 20px;
    font-size: 16px;
}

#totalPrice {
    display: block;
    font-size: 20px;
    margin-top: 20px;
}
#addInput{
	width: 25px;
}
#add {
    background-color: purple;
	width: 150px;
	height: 25px;
    border-radius: 5px;
    color: white;
    border: none;
    padding: 2px 16px; 
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#add:hover {
    background-color: lavender;
}



/* Hover effect for the submit button */
input[type="submit"]:hover {
    background-color: lightblue;
}

</style>

</head>

<body>
<?php	
		include("navbar.php");
		?>
	<div class="main">
	
		  <div class="cart">
            <h1>CART ITEMS</h1>
            <div class="row">
                   <div class="medium-6 columns">
                    <button class="tiny secondary" id="clear">Clear the cart</button>
                </div>
                <div class="medium-6 columns">
                    <button class="tiny secondary" id="checkout">Checkout</button>
                </div>
               
            </div>
            <div id="cartItems">Loading cart...</div>
            Total price: <strong id="totalPrice">0 R</strong>
			</div>

        
        <div class="flex-box">
        <div class="search-bar">
            <form action="marketplace.php" method="POST">
                <input type="search" name="searchInput" placeholder="search for anything">
                <input type="submit" name="submitSearch" value="Go" placeholder="search by name or description">
            </form>
        </div>
		</div>

<?php
require_once("config.php");
 $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
     or die("Unable to connect to db");
	 
if (isset($_REQUEST['submitSearch'])) {
    $searchInput = $_REQUEST["searchInput"];
    $query = "SELECT 
    product.ProductID,
    product.ProductType,
    product.ProductDescription,
    product.ProductName,
    product.Price,
    productimages.images as images
    FROM
    product 
    JOIN
    productimages ON product.ProductID = productimages.ProductID
    WHERE 
    product.ProductName LIKE '%$searchInput%' OR  ProductDescription LIKE '%$searchInput%'" ;
  
  } else {
  
        $query = "SELECT 
        product.ProductID,
        product.ProductType,
        product.ProductDescription,
        product.ProductName,
        product.Price,
        productimages.images as images
        FROM
        product 
        JOIN
        productimages ON product.ProductID = productimages.ProductID; ";
}

?>

<?php
$result = mysqli_query($conn, $query) or die("Query error");

?>

<table>
    <tr>
        <th><h2> &emsp;  &emsp; Textbooks </h2></th>
    </tr>
    <tr>
        <td>
            <div class="flex-box">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($row["ProductType"] == "textBook") {
                            // ... [Your textbook display code]
                            echo '<div class="product-card">
                <img src="http://cs3-dev.ict.ru.ac.za/Practicals/JavaCoffee/Student-Hub/Images/' . htmlspecialchars($row['images'], ENT_QUOTES, 'UTF-8') . '" alt="Product Image">
                <h4>' . htmlspecialchars($row["ProductName"], ENT_QUOTES, 'UTF-8') . '</h4>
                <div>
                    <span> 
                        <strong>Description: </strong> ' . htmlspecialchars($row["ProductDescription"], ENT_QUOTES, 'UTF-8') . ' <br> <br>
                        <strong>Price:</strong> R' . htmlspecialchars($row["Price"], ENT_QUOTES, 'UTF-8') . '
                    </span> 
                    <form action="viewProduct.php" method="post">
                        <input type="hidden" name="selectedProductID" value="' . htmlspecialchars($row["ProductID"], ENT_QUOTES, 'UTF-8') . '">
                        <button type="submit">+</button>
                    </form>
                </div>
				<div class="product" data-name=' . htmlspecialchars($row["ProductName"], ENT_QUOTES, 'UTF-8') . ' data-price= '. htmlspecialchars($row["Price"], ENT_QUOTES, 'UTF-8') . ' data-id="' . htmlspecialchars($row["ProductID"], ENT_QUOTES, 'UTF-8') . '">
						<input id = "addInput" type="text" class="count" value="1" />
						<button class="tiny" id="add">Add to cart</button>
					</div>
            </div>';
                        }
                    } // end of while loop

                    mysqli_data_seek($result, 0);  // Resetting result pointer for reuse

                    echo '<tr>
                            <th><h2> &emsp;  &emsp; Furniture </h2></th>
                          </tr>
                          <tr>
                            <td>
                                <div class="flex-box">';

                    while ($row = mysqli_fetch_assoc($result)) {
                        if($row["ProductType"] == "furniture") {
                            // ... [Your furniture display code]
                            echo '<div class="product-card">
                            <img src="http://cs3-dev.ict.ru.ac.za/Practicals/JavaCoffee/Student-Hub/Images/' . htmlspecialchars($row['images'], ENT_QUOTES, 'UTF-8') . '" alt="Product Image">
                            <h4>' . htmlspecialchars($row["ProductName"], ENT_QUOTES, 'UTF-8') . '</h4>
                            <div>
                                <span> 
                                    <strong>Description: </strong> ' . htmlspecialchars($row["ProductDescription"], ENT_QUOTES, 'UTF-8') . ' <br> <br>
                                    <strong>Price:</strong> R' . htmlspecialchars($row["Price"], ENT_QUOTES, 'UTF-8') . '
                                </span> 
                                <form action="viewProduct.php" method="post">
                                    <input type="hidden" name="selectedProductID" value="' . htmlspecialchars($row["ProductID"], ENT_QUOTES, 'UTF-8') . '">
                                    <button type="submit">+</button>
                                </form>
                            </div>
                        </div>';
                            
                        }
                    } // end of while loop

                    mysqli_data_seek($result, 0);  // Resetting result pointer for reuse

                    echo '<tr>
                            <th><h2> &emsp;  &emsp; Electronics </h2></th>
                          </tr>
                          <tr>
                            <td>
                                <div class="flex-box">';

                    while ($row = mysqli_fetch_assoc($result)) {
                        if($row["ProductType"] == "electronic") {
                            // ... [Your electronics display code]
                            echo '<div class="product-card">
                <img src="http://cs3-dev.ict.ru.ac.za/Practicals/JavaCoffee/Student-Hub/Images/' . htmlspecialchars($row['images'], ENT_QUOTES, 'UTF-8') . '" alt="Product Image">
                <h4>' . htmlspecialchars($row["ProductName"], ENT_QUOTES, 'UTF-8') . '</h4>
                <div>
                    <span> 
                        <strong>Description: </strong> ' . htmlspecialchars($row["ProductDescription"], ENT_QUOTES, 'UTF-8') . ' <br> <br>
                        <strong>Price:</strong> R' . htmlspecialchars($row["Price"], ENT_QUOTES, 'UTF-8') . '
                    </span> 
                    <form action="viewProduct.php" method="post">
                        <input type="hidden" name="selectedProductID" value="' . htmlspecialchars($row["ProductID"], ENT_QUOTES, 'UTF-8') . '">
                        <button type="submit">+</button>
                    </form>
                </div>
            </div>';
                        }
                    } // end of while loop
                } else {
                    echo "<p>No results found.</p>";
                }
                ?>
            </div> <!-- Flex Box-->
        </td>
    </tr>
</table>



    </div> <!--End main-->


        <script>
            var priceElements = document.getElementsByClassName("price");
            for (var i = 0; i < priceElements.length; i++) {
                priceElements[i].style.color = "red";
            }

            var productCards = document.getElementsByClassName("card");
            for (var i = 0; i < productCards.length; i++) {
                productCards[i].style.backgroundColor = "rgb(214, 214, 238)";
            }

            var productCardBtn = document.getElementsByClassName("productCardBtn");
            for (var i = 0; i < productCards.length; i++) {
                productCardBtn[i].style.backgroundColor = "rgb(179, 179, 218)";
            }
            const signOutBtn = document.getElementById('signOut-btn');
		signOutBtn.addEventListener('click', function(){
			window.location.href = 'logout.php';
		}) 
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
   <script  src="market.js"></script>       
	</body>
</html>