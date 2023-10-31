<?php
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

        *{
            font-family: 'Poppins', sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
        }

        #Co{
				background-color: aliceblue;
			}

        body {
           
            background-color: hsl(252, 30%, 95%);
            color: hsl(252, 30%, 17%);
            overflow: hidden;
        }

        .container{
            width: 80%;
            margin: 0 auto;
        }

        main {
            background-color: transparent; /* Change the background color as desired */
            padding: 5rem; /* Adjust the padding as needed */
            margin-top: 80px; /* Height of the navigation bar */
        }

        .contact-us-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
             position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            border-radius: 10px;
             min-height: 66vh;
            min-width: 125vh;
        }

        /* Style the contact list */
        .contact-list {
            list-style: none;
            padding: 0;
        }

        .contact-item {
            display: flex;
            margin-bottom: 20px;
        }

        /* Style the contact image */
        .contact-image {
            flex: 1;
            padding: 10px;
        }

        .contact-image img {
            max-width: 100%;
            height: auto;
        }

        /* Style the contact text */
        .contact-text {
            flex: 2;
            padding: 10px;
        }

        .contact-text h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .contact-text p {
            font-size: 16px;
            color: #666;
            margin: 0;
        }

        /*----------------------------------------------------------------------*/

/* LOGIN */
.modern-login-form {
    display: none;
    max-width: 600px;
    min-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
    left      : 50%;
    top       : 50%;
    position  : absolute;
    transform : translate(-50%, -50%);
}

/* Style the form header */
.modern-login-form h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Style input fields */
.modern-login-form input[type="text"], .modern-login-form input[type="email"], .modern-login-form input[type="tel"], .modern-login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.modern-login-form input[type="submit"] {
    background-color: lightblue;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 20px;
}

/* Hover effect for the submit button */
.modern-login-form input[type="submit"]:hover {
    background-color: lightblue;
}

/*----------SIGN UP-------------*/
.modern-signup-form select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
}


.btnClose {
    background-color: lightcoral;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 20px;
}


/* Style the "Sign up" link */
.signup-link {
    font-size: 14px;
    margin-top: 20px;
}

.signup-link a {
    text-decoration: none;
    color: lightblue;
    font-weight: bold;
}

/* Hover effect for the "Sign up" link */
.signup-link a:hover {
    text-decoration: underline;
}


/* Apply styles to the form container */
.modern-signup-form {
    display: none;
    max-width: 600px;
    min-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
    left      : 50%;
    top       : 50%;
    position  : absolute;
    transform : translate(-50%, -50%);
}

/* Style the form header */
.modern-signup-form h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Style input fields */
.modern-signup-form input[type="text"], .modern-signup-form input[type="email"], .modern-signup-form input[type="tel"],
.modern-signup-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style select dropdown */
.modern-signup-form select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
}

/* Style the submit button */
.modern-signup-form input[type="submit"] {
    background-color: lightblue;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 20px;
}

/* Hover effect for the submit button */
.modern-signup-form input[type="submit"]:hover {
    background-color: lightblue;
}

/*----------------------------------------------------------------------*/



        
    </style>

</head>
 
<body>

<?php	
		include("navbar.php");
		?>

<!--SIGNUP AND LOGIN  ------------------------------------------------------------------------>
<form method="POST" action="index.php" class="modern-login-form" id="loginForm">
    <h1>Login</h1>
    <div>
        <input type="text" placeholder="Username" name="username">
    </div>
    <div>
        <input type="password" placeholder="Password" name="password">
    </div>
    
    <input type="submit" name="loginClick" value="Login">
    <button type = "button" class="btnClose" onclick="closeLogin()">Close</button>
    <div class="signup-link">
        Don't have an account?
        <br>
        <a href="#" onclick="openSignUp()">Sign up</a>
    </div>
</form>

<script>
    /*unction redirectToLogin() {
      // Replace 'login.php' with the actual path to your login page.
      window.location.href = 'login.php';

      
    }*/
function openLogin() {
  document.getElementById("loginForm").style.display = "block";
}

function closeLogin() {
  document.getElementById("loginForm").style.display = "none";
}


function openSignUp() {
 document.getElementById("loginForm").style.display = "none";
  document.getElementById("signUpForm").style.display = "block";
}

function closeSignUp() {
  document.getElementById("signUpForm").style.display = "none";
}
    </script>
    
<?php 

if(isset($_REQUEST['loginClick'])){

require_once("config.php");
require_once("secure.php");

session_start();
// get values from form
$username = $_REQUEST ["username" ];
$password = $_REQUEST['password'];

 require_once("config.php");

// make connection to database
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
or die ("DATABASE ERROR: unable to validate your credentials!");

// issue query instructions
$query = "SELECT * FROM thecreatorscollective.usercredentials WHERE Username = '$username' AND Password = SHA1('$password');";

$result = mysqli_query($conn, $query) or die("QUERY ERROR: unable to validate your credentials!");


//check if the user exists in the database
if (mysqli_num_rows($result) == 1) {

// direct user to appropriate webpage
$_SESSION[ 'access'] = "yes";
header("Location:index.html");
echo "YEA BITCHH";
}

 else {

//header ("Location: index.php");
echo "tsek" ;
}
mysqli_close($conn); }

?>
<!-- Login  -->




<!-- Sign up  -->
<form method="POST" action="index.php" class="modern-signup-form" id ="signUpForm">
    <h1>Sign Up</h1>

    <div>
        <input type="text" placeholder="Enter First Name" name="fname">
    </div>

    <div>
        <input type="text" placeholder="Enter Last Name" name="lname">
    </div>
    <div>
        <input type="text" placeholder="Enter Email" name="email">
    </div>
     <div>
        <input type="text" placeholder="Enter Contact Number" name="number">
    </div>
    <div>
        <input type="text" placeholder="Create Username" name="username">
    </div>
    <div>
        <input type="password" placeholder="Create Password" name="password">
    </div>
    <div>
        <label for="gender">Select gender</label>
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
    </div>

    <div>
        <label for="isAgent">Select Account type</label>
        <select name="isAgent">
            <option value="tenant">Tenant</option>
            <option value="agent">Agent</option>
        </select>
    </div>

    <button type = "button" class="btnClose" onclick="closeSignUp()">Close</button>
    <input type="submit" name="signupClick" value="Sign Up">
</form>

<?php 
session_start();
if(isset($_REQUEST['signupClick'])){

require_once("config.php");
require_once("secure.php");

// get values from form
$email = $_REQUEST ["email" ];
$username = $_REQUEST ["username" ];
$password = $_REQUEST['password'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$number = $_REQUEST ["number" ];
$gender = $_REQUEST ["gender" ];
$isAgent = $_REQUEST["isAgent"];
$isAgentBoolean ;


if($isAgent == "tenant"){
    $isAgentBoolean = 0;
}else if($isAgent == "agent"){
    $isAgentBoolean = 1;
}else{
    echo "Is agent error";
}


// make connection to database
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
or die ("DATABASE ERROR: unable to validate your credentials!");

// query to insert user credentials
$query = "INSERT INTO  thecreatorscollective.usercredentials(Username, Pswd, Email, IsAgent) VALUES( '$username', SHA1('$password'), '$email', '$isAgentBoolean');";
$result = mysqli_query($conn, $query) or die("QUERY ERROR! User credentials");
// query to insert information
if($isAgent == "tenant")
{
$query2 = "INSERT INTO  thecreatorscollective.tenant(Tenant_Fname, Tenant_Lname, Tenant_Phone, Tenant_email, Tenant_Gender) VALUES( '$fname', '$lname', '$number','$email', '$gender');";
$result2 = mysqli_query($conn, $query2) or die("QUERY ERROR! User credentials");
}else if($isAgent == "agent"){
    $query3 = "INSERT INTO  thecreatorscollective.agent(Agent_Fname, Agent_Lname, Agent_email_address, Agent_Phone) VALUES( '$fname', '$lname','$email', '$number');";
    $result3 = mysqli_query($conn, $query2) or die("QUERY ERROR! User credentials");
}

//check if the user exists in the database
if (mysqli_num_rows($result) == 1) {

// direct user to appropriate webpage
/*$_SESSION[ 'access'] = "yes";
header("Location:success.html");*/
echo "Username already exists";
//header("Location:signup.php");
}
 else {

//header ("Location: login.php");
echo "Yea successfully registered!" ;
//header("Location:index.html");
}
mysqli_close($conn); }

?>




<!--SIGNUP AND LOGIN DONE ------------------------------------------------------------------------>

<main>
    
    <div class="contact-us-container">
        <ul class="contact-list">
            <li class="contact-item">
                <div class="contact-image">
                    <img src="person1.jpg" alt="Person 1">
                </div>
                <div class="contact-text">
                    <h2>Lesego Pitsi</h2>
                    <p>Email: l.quincypitsi@gmail.com</p>
                    <p>Phone: 0817566446</p>
                </div>
            </li>
            <li class="contact-item">
                <div class="contact-image">
                    <img src="person2.jpg" alt="Person 2">
                </div>
                <div class="contact-text">
                    <h2>Kaiser Makhubo</h2>
                    <p>Email: jane@example.com</p>
                    <p>Phone: +9876543210</p>
                </div>
            </li>
            <li class="contact-item">
                <div class="contact-image">
                    <img src="person2.jpg" alt="Person 2">
                </div>
                <div class="contact-text">
                    <h2>S'mangele</h2>
                    <p>Email: jane@example.com</p>
                    <p>Phone: +9876543210</p>
                </div>
            </li>
            <li class="contact-item">
                <div class="contact-image">
                    <img src="person2.jpg" alt="Person 2">
                </div>
                <div class="contact-text">
                    <h2>Lindokhule</h2>
                    <p>Email: jane@example.com</p>
                    <p>Phone: +9876543210</p>
                </div>
            </li>
            <li class="contact-item">
                <div class="contact-image">
                    <img src="person2.jpg" alt="Person 2">
                </div>
                <div class="contact-text">
                    <h2> Luyandza</h2>
                    <p>Email: jane@example.com</p>
                    <p>Phone: +9876543210</p>
                </div>
            </li>

         
        </ul>
    </div>

</main>

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