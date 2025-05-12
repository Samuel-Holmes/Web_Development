<?php

# making sure that the tab favicon remains uniform across pages 
echo "<link rel= 'icon' href= '../css/School-logo.png'>";

#ensuring the posts are included in the php file

$staff_name = $_POST["staff_name"];
$staff_email = $_POST["staff_email"];
$issue_location = $_POST["issue_location"];
$describe_your_issue = $_POST["describe_your_issue"];
$priority = $_POST["priority"];

# using if statements to ensure that the fields of the form are filled in correctly before being stored in the database

if (!$staff_name) {
    die("Staff name must be filled in");
}

if (!$staff_email){
    die("staff email must be provided");
}

if (!$describe_your_issue){
    die("Please provide a description of your issue");
};

# preparation and execution of the sql statement is shown below 

require __DIR__ . "/database.php";
set_error_handler("customErrorHandler");

$sql = "INSERT INTO Form_Data (Staff_Name, Staff_Email, Issue_Location, Issue_Description , Priority_Level)
        VALUES (?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss", $_POST["staff_name"], $_POST["staff_email"],$_POST["issue_location"], $_POST["describe_your_issue"], $_POST["priority"]);

$stmt-> execute();

# using echo nl2br ensures that there is adequate line break between the top of the browser window and the message to enhance readability 

echo nl2br ("\n Form submitted successfully an IT technician will contact you via email shortly");

$stmt->close();
$mysqli->close();

?>