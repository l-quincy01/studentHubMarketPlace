<?php
//Additional Security
header("Content-Security-Policy: script-src 'self' http://cs3-dev.ict.ru.ac.za/");
require_once("secure.php");
?>
<?php
 session_start();
?>

<?php

$productErr = $descriptionErr = $ProductTypeErr = $PriceErr  = "";
$ProductName = $ProductDescription =  $ProductType = $ProductPrice ="";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if (isset($_REQUEST['addProduct'])) {
    // Validation  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
       // Validate first name
   
       // Validate username
       if (empty($_REQUEST["ProductName"])) {
           $productErr = "Product Name Required";
       } else {
            $ProductName = test_input ($_REQUEST['ProductName']);
           // Check if username is valid 
       }
       
       if (empty($_REQUEST["ProductDescription"])) {
        $descriptionErr = "Product Description Required";
    } else {
        $ProductDescription =  test_input ($_REQUEST['ProductDescription']);
        // Check if username is valid 
    }

    if (empty($_REQUEST["ProductType"])) {
        $ProductTypeErr = "Product Type Required";
    } else {
        $ProductType=  test_input ($_REQUEST['ProductType']);
        // Check if username is valid 
    }

    if (empty($_REQUEST["ProductPrice"])) {
        $PriceErr = "Price Required";
    } else {
        $ProductPrice= test_input( $_REQUEST['ProductPrice']);
        // Check if username is valid 
    }
       
       
      
    // Validation  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
   
       // Check input errors before inserting in database
       if ( empty($productErr) && empty($descriptionErr)   && empty($ProductTypeErr) && empty($PriceErr) ) {


    require_once("config.php");
    //connecting to database
    $conn= mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("Error: Unable to connect to database");
    
    //making it unique 
    $images =time() . $_FILES['images']['name'];

   //move the file to the upload folder 
    $destination= "Images/" . $images;
    move_uploaded_file($_FILES['images']['tmp_name'], $destination);


        //++++++++++++++++++++++++++++++++++++++++++++++
        $userID = $_SESSION["userID"] ;
        $queryUserProfileID = "SELECT UserProfileID From userprofile where UserID =  $userID";
        $resultUserProfileID= mysqli_query($conn,$queryUserProfileID ) or die ("Error: Unable to execute query" .mysqli_error($conn));
        $rowUserProfileID = mysqli_fetch_assoc($resultUserProfileID) ;
        $userProfileID = $rowUserProfileID["UserProfileID"] ;

        //++++++++++++++++++++++++++++++++++++++++++++++

    //issuing instructions
    $query= " INSERT INTO g21p7126.product(ProductType, ProductName, ProductDescription , Price, UserProfileID) 
    VALUES( '$ProductType', '$ProductName', '$ProductDescription', '$ProductPrice', '$userProfileID') ";
    $result= mysqli_query($conn,$query) 
    or die ("Error: Unable to execute query" .mysqli_error($conn));

    $productID = mysqli_insert_id($conn);

    //insert images 
    $query= " INSERT INTO g21p7126.productimages(images, ProductID) 
    VALUES('$images', '$productID') ";
    $result= mysqli_query($conn,$query) 
    or die ("Error: Unable to execute query" .mysqli_error($conn));
    //close connection
    mysqli_close($conn);

    //message indicating successful indication 
    echo"<p style='color:blue;'>New product has been added</p>";

    }
       
}
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
    <title>MarketPlace</title>

<style>
           
.error {color: #FF0000;}


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


</style>

</head>

<body>
<?php	
		include("navbar.php");
		?>

    
	<div class="main">
        <div class="flex-box">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="modern-form" >
            
        <p><span class="error">* required fields</span></p>
              <label for="ProductName" >Product Name:</label><br>
              <span class="error">* <?php echo $productErr;?></span>
              <input type="text" name= "ProductName" ID="ProductName"  ><br> 
              <label for="ProductDescription" >Description:</label><br>
              <span class="error">* <?php echo $descriptionErr;?></span>
              <textarea id="ProductDescription" name="ProductDescription" rows="20" col="300" ></textarea><br>
              <br>
              Select One, Required:
              <span class="error">* <?php echo $ProductTypeErr;?></span>
              <label>
                <input type="radio" name="ProductType" value="textBook" > Text-book
            </label>
            <label>
                <input type="radio" name="ProductType" value="furniture" > Furniture
            </label>
            <label>
                <input type="radio" name="ProductType" value="electronic" > Electronic
            </label>
            <label>
                <input type="radio" name="ProductType" value="other" > Other
            </label>
            <br>
              <label for="ProductPrice" >Product Price:</label><br>
              <span class="error">* <?php echo $PriceErr;?></span>
              <input type="text" name= "ProductPrice" ID="ProductPrice"  ><br> 
              <label for="images">Picture:</label><br>
              <input type="file" name="images" id="images"  required><br>
              <input type="submit" name="addProduct" value="Add">
          </form>
    
        </div>
    </div> <!--End main-->


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