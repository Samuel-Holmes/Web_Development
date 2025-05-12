<?php

#ensuring database connection through the seperate php file

require __DIR__ . "/database.php";
set_error_handler("customErrorHandler");

# below I have retrieved the ID from the appended value in the URL from the tech requests page 

# I have then prepared an sql statement that will allow technicians to update job status to complete based upon the click of the href in the previous page

# with a relocation so they see the job statues update to complete following  back to tech requests page if the query is run succesfully 

# if the update is not completed successfully the process will be ended with the error message passed to the txt file 

$ID_Variable = $_GET['ID'];

$sql = "UPDATE Form_Data SET Job_Status = 'Complete' WHERE ID = $ID_Variable;";

if ($mysqli->query($sql) === TRUE){
    header("Location: https://24m74bi64oi.uoswebspace.co.uk/BI64OI_AT2/php/tech_requests.php");

}else{
    die("Update failed:" . $mysqli->error);
}

$mysqli->close();

?>