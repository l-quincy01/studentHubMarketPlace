<?php

//Additional Security
header("Content-Security-Policy: script-src 'self' http://cs3-dev.ict.ru.ac.za/");
require_once("secure.php");


require_once("config.php");

$messageErr = "";
$message= "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["msg"])) {
        $messageErr = "Message Required";
    } else {
        $message = test_input($_POST['msg']);
    }

    if (empty($messageErr)) {
        //connecting to database
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or die("Error: Unable to connect to database");

        $userProfileID = $_SESSION["userProfileID"];
        date_default_timezone_set('Europe/Berlin');
        $date = date('l, F, j, Y g:i:s A');

        $query = "INSERT INTO g21p7126.posts(post_text, post_date, userProfileID) VALUES(?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $message, $date, $userProfileID);
        mysqli_stmt_execute($stmt) or die("Error: Unable to execute query" . mysqli_error($conn));

        mysqli_close($conn);

        header("Location: " . $_SERVER["PHP_SELF"]); // Redirect to the same script
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Stubbie Forum</title>
	<link rel="stylesheet" href="forum.css">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<script src="https://kit.fontawesome.com/bd25c14ac9.js" crossorigin="anonymous"></script>

	<style>
		.forum-post {
			background-color: #f2f2f2;
			border: 1px solid #ddd;
			padding: 10px;
			margin-bottom: 15px;
			border-radius: 5px;
		}

		#Fo{
				background-color: aliceblue;
			}

		.post-user {
			font-weight: bold;
		}

		.post-message {
			margin-top: 5px;
			margin-bottom: 10px;
		}

		.post-date {
			font-size: smaller;
			color: #555;
		}

		.no-chat-message {
			font-style: italic;
		}

	</style>
</head>
<body>
	
<?php	
		include("navbar.php");
		?>

	<div class="container">

	    <h1>General Chat</h1>
	    <div id="chat-box">
	        <ul id="message-list">
	            <?php
				require_once("config.php");
				//connecting to database
				$conn= mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
				or die("Error: Unable to connect to database");

				$query = "SELECT posts.post_text, posts.post_date, posts.userProfileID, userprofile.FirstName, userprofile.LastName
				FROM posts 
				JOIN userprofile
				ON posts.userProfileID  =  userprofile.userProfileID ;";

				$result = mysqli_query($conn, $query) or die ("DIE");

				if(mysqli_num_rows($result) > 0)
				{

					while($row = mysqli_fetch_assoc($result)){

						echo "<div class='forum-post'>";
						echo "<div class='post-user'>" . $row["FirstName"]. " ". $row["LastName"]. "</div>";
						echo "<div class='post-message'>" . $row["post_text"] . "</div>";
						echo "<div class='post-date'>Posted on: " . $row["post_date"] . "</div>";
						echo "</div>";
				
				}


				}else{

					echo "<div class='no-chat-message'>No chat has been started</div>";
				}
				
				?>
	        </ul>
	        
	        <!-- <input type="file" id="image-input" accept="image/*"> -->

			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="message-input" >
			<input type="text" id="message-input" name= "msg" placeholder="Type your message">
			<input type="submit" name="sendMsg" id="">
			</form>

			
			 
			
			
	    </div>
	</div>

	<?php	
		include("footer.php");
	?>
	<script src="forum.js"></script>
	<script src="index.js"></script>
</body>
</html>