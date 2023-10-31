
<?php
require_once("secure.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant</title>
 <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="styles.css">
</head>

<style>

.TenantContainer {
    max-width: 1600px;
    max-height: 800px; /* Or whatever height you want it to be */
    
    margin: 20px auto; /* Gives some space above and below */
    padding: 40px;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow-y: auto;
    width: 80vw; 
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    
}
.dropbtn {
  background-color: transparent;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: lavender;}


</style>




<body>

<nav>
			<div class="logo"> JavaCoffee</div>
			<div id="nav-links">
				<ul id="nav-bar">
					<li id="H"><a href="index.php">Home</a></li>

					<div class="dropdown">
  						<button class="dropbtn">Update</button>
  							<div class="dropdown-content">
   									 <a href="editUser.php">Update User</a>
    								<a href="updateProduct.php">Update Product</a>
    								<a href="#">Link 3</a>
  							</div>
					</div>

					<div class="dropdown">
  						<button class="dropbtn">Create</button>
  							<div class="dropdown-content">
   									 <a href="#">Link 1</a>
    								<a href="#">Link 2</a>
    								<a href="#">Link 3</a>
  							</div>
					</div>




				</ul>
				<button id="signOut-btn">Signout</button>
			</div>
		</nav>


<div class="TenantContainer" style = "margin-top: 20px;">

<?php
    //fetch database credentials
    require_once("config.php");
    //connect to database
    $conn= mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
or die("Error:unable to connect to the database!");

//issue query instructions
$query= "SELECT * FROM g21p7126.userprofile ";
$result= mysqli_query($conn,$query)   
or die("Error:Unable to execute query".mysqli_error($conn));


        echo "<table style='border-collapse: collapse; width: 100%;' border='1'>
        <tr >
        
            <th >First Name</th>
            <th >Last Name</th>
            <th >UserID</th>
             
        </tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row['FirstName']. "</td>";
    echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row['LastName']. "</td>";
    echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row['UserID']. "</td>";
    echo "<td style='border: 1px solid #000; padding: 8px;'>" . "<a href=\"editUser.php?id=" . $row['UserProfileID'] . "\" ><input type =\"button\" value=\"Edit\" class=\"btn\">" . "</td>";
    echo "</tr>";

}
  echo   "</table>";





//close connection
mysqli_close($conn);


    ?>  

</div>



</body>

</html>