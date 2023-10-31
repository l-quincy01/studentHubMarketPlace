<?php
session_start() ;
// Initialize variables and set to empty strings
 $userNameErr = $passwordErr = $incorrectErr = "";
$username = $password = "";


?>

<?php
          
        // Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form was submitted
if (isset($_REQUEST['loginClick'])) {
 // Validation  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
    // Validate first name

    // Validate username
    if (empty($_REQUEST["username"])) {
        $userNameErr = "Username is required";
    } else {
        $username = test_input($_REQUEST["username"]);
        // Check if username is valid
        if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_-]{2,19}$/", $username)) {
            $userNameErr = "Invalid username format";
        }
    }
    
    // Validate password
    if (empty($_REQUEST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_REQUEST['password']);
        // You can add password validation rules here
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $password)) {
            $passwordErr = "Invalid password format. Password must be 8+ characters and include at least one uppercase letter.";
        }
    }
 // Validation  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 

    // Check input errors before inserting in database
    if ( empty($userNameErr) && empty($passwordErr)) {


        	require_once("config.php");
			$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);
			// Get values from form
			$username = $_REQUEST["username"];
			$password = $_REQUEST['password'];
		
			// Establish a connection to the database
			
		
			if ($conn->connect_error) {
				die("DATABASE ERROR: " . $conn->connect_error);
			}
		
			// Issue query instructions
			$query = "SELECT * FROM g21p7126.usercredentials WHERE Username = '$username' AND Pswd = SHA1('$password');";
			$result = $conn->query($query);
		
			if (!$result) {
				die("QUERY ERROR: " . $conn->error);
			}
		
			// Check if the user exists in the database
			if ($result->num_rows == 1) { // therefore it exists and is unique
			   
		
				$row = $result->fetch_assoc();
			
				$userID = $row['UserID']; // Make sure the column name is 'UserID'
		
				$_SESSION["userID"] = $userID; //set userID session
		
				if ($UserID  == 42) {
				
					header("Location: indexAdmin.php");
					exit;
				} else{ 
					// NOT ADMIN
					
					//$_SESSION['loggedIn'] = "0";
					$query2 = "SELECT * FROM g21p7126.userprofile WHERE userID = $userID;";
					$result2 = $conn->query($query2);
		
					if (!$result2) {
						die("QUERY ERROR: " . $conn->error);
					}
		
					$row2 = $result2->fetch_assoc();
					$_SESSION["fName"] = $row2['FirstName'];
					$_SESSION["lName"] = $row2['LastName'];
					//$_SESSION["bio"] = $row2['Bio'];
					$_SESSION["userProfileID"] = $row2["UserProfileID"];
					  //enable access
					  $_SESSION['access'] = "yes";
					  
					echo "<script>alert('Successfully logged in as a USER');
					window.location.href='landing.php';</script>";
			  		header("Location:index.php");
		
				}  
		
			   
				exit;
			}
			else {
				/*echo "<script>
				alert('Invalid username or password.');
				window.location.href='landing.html';
			  </script>";*/

			  $incorrectErr = "Username or Password is invalid";
			 

		
			}
		
			$conn->close();
       
} 
}
        
        ?>





<!DOCTYPE html>

<html>
    <head>
        <meta lang="en">
		<title>Login
		</title>
		<link rel="stylesheet" href="login.css">

		<style>
.error {color: #FF0000;}
</style>

    </head>
	
	<!-- set body background color, add a background image and style it to look neat-->
    <body>
			<!-- Login form block -->
		<div class="form-wrapper">
			<header>Welcome back to StuHub</header>
		



			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			<p><span class="error">* required field</span></p>

			<span class="error">* <?php echo $userNameErr;?></span>
				<div id="username">
					<div class="input-box">
						<input type="text" name="username" placeholder="Username" >
					</div>
					<div class="errorTxt">
						Username can't be blank
					</div>
				</div>


				<span class="error">* <?php echo $passwordErr ;?></span>
				<div id="password">
					<div class="input-box">
						<input type="password" name ="password" placeholder="Password" >
					</div>
					<div class="errorTxt">
						Password can't be blank
					</div>
				</div>
				<span class="error">* <?php echo $incorrectErr ;?></span>
				

				<div id="remember-cancel">
					<label id="remember"><input type="checkbox"> Remember me</label>
					<label id="cancel"><input type="checkbox"> Cancel</label>
				</div>
					
				<!-- Login button: takes you to home page -->
				<button type="submit" name="loginClick" class="submit-btn">
					Login
				</button>
					
					<!-- Register if you dont have an account -->
				<div class="register-link">
					<p>Don't have an account? <a href="register.php">Register</a><p>
				</div>
			</form>
		</div>




    </body>
</html>