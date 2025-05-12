<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";
    set_error_handler("customErrorHandler");

    $username = $_POST["user"];
    $password = $_POST["pass"];
    $hash = hash("sha256",$password);

    $sql_nonadmin = "SELECT * FROM Staff_User_Auth WHERE Staff_User_Name = ?";
    $stmt_nonadmin = $mysqli->prepare($sql_nonadmin);
    $stmt_nonadmin->bind_param("s", $username);
    $stmt_nonadmin->execute();

    $result_nonadmin = $stmt_nonadmin->get_result();
    $user_nonadmin = $result_nonadmin->fetch_assoc();

    $sql_admin = "SELECT * FROM Tech_User_Auth WHERE Tech_User_Name = ?";
    $stmt_admin = $mysqli->prepare($sql_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();

    $result_admin = $stmt_admin->get_result();
    $user_admin = $result_admin->fetch_assoc();

    if ($hash === $user_nonadmin["Staff_Password"]){
        header("Location: https://24m74bi64oi.uoswebspace.co.uk/BI64OI_AT2/html/IT_Form_Submission.html");
        exit();
    
    } else if($hash === $user_admin["Tech_Password"]){
        header("Location: https://24m74bi64oi.uoswebspace.co.uk/BI64OI_AT2/php/tech_requests.php");
        exit();
    
    }else{
        echo "Invalid Username or Password";
        echo nl2br("\n Please Wait to be Redirected");
        header("Refresh: 5; url ='https://24m74bi64oi.uoswebspace.co.uk/BI64OI_AT2/html/login.html'");
        }
}

$mysqli->close();

# CODE EXPLANATION 

# in the code above

# firstly an if statement is opened that states if the server request method is post i.e. submission of the login form is completed then the code will run 

# we then stipulate the database connection is required and store this in a mysqli object 

# following this we establish variables to store the user input for the username and password fields 

# the password is then hashed with the same method as the stored password in the database as the hash is a function it will produce the same result given the same input 

# prepared statements are then made to check for a row based upon username as in the future these usernames for staff members and techncians should be unique 

# we execute these statements and store them in results which we then fetch the arrays of

# we can then check if the hashed password is equal to a non admin users ["Staff_Password"] value if it is they are directed to the IT form 

# if it isn't the else if code block is run which checks the admin["Tech_Password"] against the $hash value. If it matches the user is directed to the tech requests page 

# if the input satisfies neither of these conditions then the else code block is run which displays the JavaScript alert invalid credentials 

# NOTES FOR FUTURE IMPROVEMENTS 

# in future remember to var_dump in order to view the array this is a useful debugging tool when struggling with setting this kind of system up

# also use error handlers for individual areas of the code this helped find a syntax error that existed in the original sql prepare statement leading to failure. debugging should not be overlooked throughout slightly more complex processes

# the use of prepared statements with bound parameters are beneficial for sql injection prevention due to users not being able to alter the sql itself through their inputs the statement remains intact regardless of what the user enters  

# REVISIT AND IMPLEMENT THE FUNCTIONALITY DESCRIBED BELOW 

# this if conditional does not contain code for session cookies as per project requirements, however, this would massively improve security through greater access control it will be something I intend to keep working on post submission 
# if session cookies are to be added this is where to do so, this would be achieved by opening a session when login conditions are met  
?>