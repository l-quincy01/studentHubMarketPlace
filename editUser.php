<?php
//Additional Security
header("Content-Security-Policy: script-src 'self' http://cs3-dev.ict.ru.ac.za/");
require_once("secure.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/909be56dda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
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

   
</head>
 
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



<main>

<?php
    //fetching the ID from Tenant.php
    $userProfileID = $_REQUEST['id'];
    //fetch database credentials
    require_once("config.php");
    //connect to database
    $conn= mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
or die("Error:unable to connect to the database!");

//issue query instructions
$query= "SELECT * FROM g21p7126.userprofile WHERE UserProfileID = $userProfileID ";
$result= mysqli_query($conn,$query) 
or die("Error:Unable to execute query".mysqli_error($conn));
//fetching data from database
while($row = mysqli_fetch_array($result)){
            $a = $row['UserProfileID'];
            $b=$row['FirstName'];
            $c=$row['LastName'];
            $d=$row['UserID'];
            
}

mysqli_close($conn)
    ?>

    <div class="TenantContainer"> 

    <form action="updateUserAction.php" method="POST">
        <fieldset>
            <h1>Update Tenants</h1>
            <table>
                <tr>
                    <td>
                        <label for ="Tenant_Fname"> First Name</label><br>
                        <input type="text" name="FirstName" id="Tenant_Fname" value="<?php echo $b;?>"required><br>
                        <label for ="Tenant_Lname"> Last Name</label><br>
                        <input type="text" name="LastName" id="Tenant_Lname" value="<?php echo $c;?>"required><br>
                        <label for ="Tenant_Phone">UserID</label><br>
                        <input type="text" name="UserID" id="Tenant_Phone" value="<?php echo $d;?>"required><br>
                        <input type="hidden" name="selectedUserID" id="tenantid" value="<?php echo $a;?>"required><br>
                        <input type="submit" name="submit" value="Update"> 
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

    </div>

</main>




</body>
</html>