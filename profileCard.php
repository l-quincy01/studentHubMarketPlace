<?php
require_once("secure.php");
?>

<?php
require_once("config.php");

// Connecting to the database
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
    or die("Error: Unable to connect to the database");

// Retrieve the userProfileID from the session
$userProfileID = $_SESSION["userProfileID"];
echo "$userProfileID<br>";

// Create a SQL query to fetch the user's first name and last name
$query = "SELECT firstName, lastName FROM userprofile WHERE UserProfileID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userProfileID); // Assuming UserProfileID is an integer
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Query failed: " . $conn->error); // Use $conn->error to retrieve the error message
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $firstName = $row['firstName']; // Use the correct column names
        $lastName = $row['lastName'];

        // Display the user's first name and last name
        echo "First Name: $firstName<br>";
        echo "Last Name: $lastName<br>";
    }
} else {
    echo "User not found.";
}

// Close the database connection
$conn->close();
?>

<style>
    .profile_card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0);
    max-width: 100%;
    margin: 0px;
    text-align: center;
    position: absolute;
    z-index: 999;
    }

    .title {
    color: grey;
    font-size: 18px;
    }

    button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
    }

    a {
    text-decoration: none;
    font-size: 22px;
    color: black;
    }

    button:hover, a:hover {
    opacity: 0.7;
    }
</style>

<div class="profile_card">
	<img src="Images/profile.png" alt="John" style="width:100%">
	<h1><?php echo $userFirstName . ' ' . $userLastName; ?></h1>
	<p class="title">CEO & Founder, Example</p>
	<p>Harvard University</p>
	<a href="#"><i class="fa fa-dribbble"></i></a>
	<a href="#"><i class="fa fa-twitter"></i></a>
	<a href="#"><i class="fa fa-linkedin"></i></a>
	<a href="#"><i class="fa fa-facebook"></i></a>
	<p><button>Contact</button></p>
</div>