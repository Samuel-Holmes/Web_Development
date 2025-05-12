<?php

$host = "localhost:3306";
$dbname = "Wearview_AT2";
$username = "logmein";
$password = "zA%8ye88";

# above specifying the details to be used in order to access the database

$mysqli = new mysqli($host, $username, $password, $dbname);



if ($mysqli->connect_errno) {
    die("connection failed: " . $mysqli->connect_error);
}

return $mysqli;

#above established the connection to the database using  a mysqli object there is an if statement used to end the connection and display a message if the connection is unsuccesful. Outside of the curly braces can be viewed as else so if the connection is succesful then the $mysqli onject is returned. 

# below created an error handler function

error_reporting(E_ALL);
ini_set("display_errors", 0);

# the code above firstly ensures that all errors are reported inclusive of general errors, warning errors and parsing errors. The second line of code sets the configuration value for display errors to zero. This can be looked at as a boolean value with 0 representing false. This ensures that errors will not be displayed within the webpage.

# it is important to note that these are runtime errors 


# The code below contains the function for the custom error handler so we can then set the error handler using the set error handler function

# the error messages have been formatted into a legible syntax which has then be saved to a variable $message this allows use of the error log function firstly specifying that the $message variable is included in the error log along with the PHP_EOL signifying the end of the line this will ensure each error message is included on its own line within the log. Secondly the number three signifies that the error log will be a txt file. Then the file is specified. Finally, the set error handler function is used to change the configuration value to the function that has just been defined.  

function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    $message = "Error: [$errno] $errstr - $errfile:$errline";
    error_log($message . PHP_EOL, 3, "../errors/error_log.txt");
}

?>