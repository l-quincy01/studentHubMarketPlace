<?php
// Initialize variables and set to empty strings
$fnameErr = $lnameErr = $userNameErr = $passwordErr = "";
$fname = $lname = $username = $password = "";
error_reporting(E_ALL & ~E_WARNING);


?>

<?php
        session_start() ;
        // Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form was submitted
if (isset($_REQUEST['signupClick'])) {
 // Validation  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
    // Validate first name
    if (empty($_REQUEST["firstName"])) {
        $fnameErr = "First name is required";
    } else {
        $fname = test_input($_REQUEST['firstName']);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        }
    }

    // Validate last name
    if (empty($_REQUEST["lastName"])) {
        $lnameErr = "Last name is required";
    } else {
        $lname = test_input($_REQUEST['lastName']);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        }
    }

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
    } else if( $_REQUEST['password'] != $_REQUEST['password2'] )
    {
        $passwordErr = "Passwords do not match";
    } else {

        $password = test_input($_REQUEST['password']);
        // You can add password validation rules here

        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $password)) {

            $passwordErr = "Invalid password format. Password must be 8+ characters and include at least one uppercase letter.";
        }
    }
 // Validation  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 

    // Check input errors before inserting in database
    if (empty($fnameErr) && empty($lnameErr) && empty($userNameErr) && empty($passwordErr)) {
        // Include config file
        require_once("config.php");

        // Establishing a connection to the database
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or die("DATABASE ERROR: unable to validate your credentials!");

        // Check if user exists before insertion
        $checkUserQuery = "SELECT * FROM g21p7126.usercredentials WHERE Username = '$username';";
        $checkResult = mysqli_query($conn, $checkUserQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            
            //enable access
           $_SESSION['access'] = "yes";

            // Insert user credentials
            $query = "INSERT INTO g21p7126.usercredentials (Username, Pswd) VALUES ('$username', SHA1('$password')    );";
            $result = mysqli_query($conn, $query) or die("QUERY ERROR: User credentials");
        
                // Retrieve the last inserted UserID
                $userID = mysqli_insert_id($conn);

                //PROFILE DETAILS INSERTED
                   
                    $query2 = "INSERT INTO g21p7126.userprofile(FirstName, LastName, UserID) VALUES('$fname', '$lname', '$userID');";
                    $result2 = mysqli_query($conn, $query2) or die("QUERY ERROR! User credentials");
        
                    // Fetching data for user and set session variables
                    $query2 = "SELECT * FROM g21p7126.userprofile WHERE userID =  $userID;";
                    $result2 = mysqli_query($conn, $query2) or die("QUERY ERROR: unable to retrieve tenant data!");
                    $row2 = mysqli_fetch_assoc($result2);
        
                    // Set session variables for user
                    $_SESSION["fName"] = $row2['FirstName'];
                    $_SESSION["lName"] = $row2['LastName'];
                    $_SESSION["bio"] = $row2['Bio'];
                    $_SESSION["userProfileID"] =  $row2["UserProfileID"] ;
                    $_SESSION["userID"] =  $userID;
                    echo "<script>alert('Successfully logged in as a tenant');
                    window.location.href='landing.php';</script>";
                header("Location:index.php");
               
                echo "<script>alert('Registration successful');</script>";
            
        }

        // Close connection
        mysqli_close($conn);
    }
}
        
        ?>



<!DOCTYPE html>

<html>

    <head>
        <meta lang="en">
		<title>Sign-up</title>
		<link rel="stylesheet" href="login.css">
		
		

        <style>
.error {color: #FF0000;}
</style>

    </head>

    <body>
<div class="form-wrapper" >
			<!-- Take in Username and Password; added some css inline styling -->
<form method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin: 20px">
    <p><h1>Become a StuHubbie</h1>Please fill in the  details to create an account</p>
    
    <p><span class="error">* required field</span></p>
    <span class="error">* <?php echo $fnameErr  ;?></span>
    <div class="input-box">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" placeholder="First Name" id="firstName" >
    </div>

    <span class="error">* <?php echo $lnameErr;?></span>
    <div class="input-box">
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" placeholder="Last Name" id="lastName" >
    </div>
    
    <span class="error">* <?php echo $userNameErr;?></span>
    <div class="input-box" onchange="validateUsername()">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" id="username" >
    </div>
    
    <span class="error">* <?php echo $passwordErr ;?></span>
    <div class="input-box" onchange="validatePassword()">
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" id="password" >
    </div>

    <div class="input-box" onchange="validateRePass()">
        <label for="n_password">Re-enter Password:</label>
        <input type="password" placeholder="Re-enter Password" name = "password2" id="n_password" >
    </div>

    
    <div class="remember-cancel">
        <label><input type="checkbox"> Remember me</label>
        <label><input type="checkbox" id="cancel"> Cancel</label>
    </div>
    

    <div class="T&C">
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a></p>    
      
    </div>   

    <input type="submit" name="signupClick" class="create-btn"  value="Create"> 

    <!-- Register if you dont have an account -->
    <div class="sign-in">
        <p>Already have an account? <a href="login.php">Sign in</a><p>
    </div>
        
</form>

		</div>
        <script src="register.js"></script>
        <script> 
            var submit = document.getElementByClassName('create-btn'); 
            submit.addEventListener('click', function(){
                window.location.href = 'loadingScreen.php';
            });
        </script>
       


    </body>
</html>