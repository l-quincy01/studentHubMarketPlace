<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

//credentials
require_once("config.php");
    //fetch data from form 
    $Tenant_Fname = $_REQUEST['FirstName'];
    $Tenant_Lname=$_REQUEST['LastName'];
     $Tenant_ID_up = $_REQUEST['selectedUserID'];

     //make connection
     $conn= mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
or die("Error:unable to connect to the database!");

//issue query instructions
$query= "UPDATE userprofile SET FirstName = '$Tenant_Fname', LastName = '$Tenant_Lname' WHERE UserProfileID = $Tenant_ID_up ";

$result= mysqli_query($conn,$query) or die("Error:Unable to execute query".mysqli_error($conn));

mysqli_close($conn);
//display message to confirm update
echo "<p style=\color:green\">The record was updated successfully</p>";
header("Location:allUsers.php");
    ?>
</body>
</html>